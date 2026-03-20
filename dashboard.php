<!DOCTYPE html>
<html><head><title>Dashboard</title><script src='https://cdn.jsdelivr.net/npm/chart.js'></script></head>
<body><h1>Stock Dashboard</h1><canvas id='chart'></canvas>
<table id='tbl' border='1'><thead><tr><th>Product</th><th>Stock</th><th>Ordered</th><th>Left</th></tr></thead><tbody></tbody></table>
<script>
function load(){fetch('get_stock_data.php').then(r=>r.json()).then(d=>{updateChart(d);updateTable(d);});}
let chart;
function updateChart(data){const ctx=document.getElementById('chart').getContext('2d'); if(chart) chart.destroy(); chart=new Chart(ctx,{type:'bar',data:{labels:data.map(i=>i.name),datasets:[{label:'Left',data:data.map(i=>i.stock_left)},{label:'Ordered',data:data.map(i=>i.total_ordered)}]}});}
function updateTable(data){const tb=document.querySelector('#tbl tbody'); tb.innerHTML=''; data.forEach(i=>{tb.innerHTML+=`<tr><td>${i.name}</td><td>${i.stock}</td><td>${i.total_ordered}</td><td>${i.stock_left}</td></tr>`});}
load();
</script></body></html>