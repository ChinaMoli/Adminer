const long2ip = (number) => {
    const a = (number << 0) >>> 24;
    const b = (number << 8) >>> 24;
    const c = (number << 16) >>> 24;
    const d = (number << 24) >>> 24;
    return a + '.' + b + '.' + c + '.' + d;
};

/**
 * @param {Element} td 单元格元素
 */
const render = (td) => {
    const value = td.innerHTML;

    // 匹配时间
    if (value.match(/^(\d{10}|\d{13})$/) && td.id.match(/(time|_at|date)\]$/i)) {
        const date = new Date();
        date.setTime(value.length === 10 ? parseInt(value) * 1000 : parseInt(value));
        let datetime = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
        // 补前导 0
        datetime = datetime.replace(/\b\d{1}\b/g, '0$&');

        // 追加毫秒时间
        if (value.length === 13) {
            datetime += '.' + String(date.getMilliseconds()).padStart(3, '0');
        }

        td.innerHTML = value + '(<span class="plugin-readable-number">' + datetime + '</span>)';
        return;
    }

    // 匹配 IP
    if (value.match(/^\d{1,10}$/) && td.id.match(/ip\]$/i)) {
        td.innerHTML = value + '(<span class="plugin-readable-number">' + long2ip(value) + '</span>)';
        return;
    }
};

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('#table tbody:last-child td[id^="val"]').forEach(td => render(td));

    // 监听表格新增
    new MutationObserver(mutations => mutations.forEach(mutation => {
        mutation.addedNodes.forEach(tbody => {
            if (tbody.nodeName !== 'TBODY') {
                return;
            }
            tbody.childNodes.forEach(tr => tr.childNodes.forEach(td => render(td)));
        });
    })).observe(document.getElementById('table'), { childList: true, subtree: true });
});