// Creating function add_slots

var  tr, td, row, cell,btn,count;

function create_cells(cells,tables,id_name,count){
    tr = document.createElement('tr');
    for (cell = 0; cell < cells; cell++) {
        td = document.createElement('td');
        btn=document.createElement('button');
        btn.classList.add("slots");
        btn.setAttribute("id",id_name+(count+cell+1));
        console.log(count+cell+1);
        td.appendChild(btn);
        tr.appendChild(td);
        btn.innerHTML=count+cell+1;
        tables.appendChild(tr);
    }
    
}
function add_slots(current,cells,tables,division,id_name){

    count=0;

    for (row = 0; row < Math.floor(current/cells) ; row++) {
       create_cells(cells,tables,id_name,count*cells);
       count=count+1;
    }
    if((current%cells)!=0){
       create_cells((current%cells),tables,id_name,((Math.floor(current/cells))*cells));
   }
   document.getElementById(division).appendChild(tables);
}

//Current Day 

// ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

var day=new Date().getDay();

//For Cars

var cars_cells=5;
if(day==5 || day==3 || day==6){
    cars_cells=3;
}

var cars;
cars=[25,24,25,24,24,23,24];

var cars_table = document.createElement('table');

var cars_current=cars[day];

add_slots(cars_current,cars_cells,cars_table,"cars-div","car_slot");

//For Bikes

bikes_cells=5;
if(day==5){
    bikes_cells=7;
}

var bikes;
bikes=[16,28,17,36,30,53,36];

var bikes_table = document.createElement('table');

var bikes_current=bikes[day];

add_slots(bikes_current,bikes_cells,bikes_table,"bikes-div","bike_slot");



