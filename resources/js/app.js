import './bootstrap';
import jsPDF from "jspdf";
import autoTable from "jspdf-autotable";
window.autoTable = autoTable;
window.jsPDF = jsPDF;

let profit_btn = document.getElementById('profit_button')
let margin_btn = document.getElementById('margin_btn')

// getting the project profit
function calculate_profit(){

    let project_cost = document.getElementById('budget').value
    let current_cost = document.getElementById('current_cost').value

    let project_cost_value = Number(project_cost);
    let current_cost_value = Number(current_cost);

    let profit = project_cost_value - current_cost_value;

    if(project_cost_value < current_cost_value){
        profit_value.innerText = 0;
    }else{
        profit_value.innerText = profit.toLocaleString();
    }
}
if (profit_btn) {
    profit_btn.addEventListener('click', () => {
        calculate_profit();
    });
}

//calculate profit margin percentage

function profit_margin_calcu(){
    let project_cost = document.getElementById('budget').value
    let current_cost = document.getElementById('current_cost').value

    let project_cost1 = Number(project_cost);
    let current_cost2 = Number(current_cost);

    let profit = project_cost1 - current_cost2
    let profit_margin = (profit / project_cost) * 100
    if(profit < 0){
        margin_value.innerText = 0
    }else{
        margin_value.innerText = profit_margin
    }
}
if(margin_btn){
  margin_btn.addEventListener('click', ()=>{
    profit_margin_calcu()
})
}



//code downlaoding reports in pdf and excel formats

window.downloadPdf = function () {

    const doc = new jsPDF();

    const now = new Date();
    const formattedDate = now.toLocaleDateString();

    doc.text("Completed Projects Report - " + formattedDate, 14, 15);

    autoTable(doc, {
        html: '#completed_projects',
        startY: 25
    });

    doc.save("completed_projects_" + Date.now() + ".pdf");
}

//active projectbpm
window.downloadPdf1 = function () {

    const doc = new jsPDF();

    const now = new Date();
    const formattedDate = now.toLocaleDateString();

    doc.text("Active Projects Report - " + formattedDate, 14, 15);

    autoTable(doc, {
        html: '#active_projects',
        startY: 25
    });

    doc.save("active_projects_" + Date.now() + ".pdf");
}

//all projects
window.downloadPdf2 = function () {

    const doc = new jsPDF();

    const now = new Date();
    const formattedDate = now.toLocaleDateString();

    doc.text("All Projects Report - " + formattedDate, 14, 15);

    autoTable(doc, {
        html: '#all_projects',
        startY: 25
    });

    doc.save("all_projects_" + Date.now() + ".pdf");
}