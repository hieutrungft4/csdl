function myToggle() {
    var tablelistEle = document.getElementById('table-list');
    if (tablelistEle.style.display === 'none') {
        tablelistEle.style.display = 'block';
    }
    else {
        tablelistEle.style.display = 'none';
    }
}