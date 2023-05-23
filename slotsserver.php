<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $mob=$_SESSION["mobile_number"];
    $db=mysqli_connect('localhost:4306','root','','parking_users') or die("could not connect to database");
    $user_check_query="SELECT last_name FROM users where mail_id='$mob' limit 1;";
    $results=mysqli_query($db,$user_check_query);
    $user=mysqli_fetch_assoc($results);

    $lastName=json_encode($user["last_name"]);

    $user_check_query="SELECT slot FROM users where slot is not null;";
    $results=mysqli_query($db,$user_check_query);
    $rows = $results->fetch_all(MYSQLI_ASSOC);
    $a=array();
    foreach ($rows as $row)
    {
        if(!(is_null($row["slot"])) && $row["slot"]!="")
        {
        
            array_push($a,$row["slot"]);
        }
    }
    $arr=json_encode($a);

    $user_check_query="SELECT slot FROM users where mail_id = '$mob' limit 1";
    $results=mysqli_query($db,$user_check_query);
    $user=mysqli_fetch_assoc($results);

    $reg=$user['slot'];
    $_SESSION["slot"]=$reg;
    $reg=json_encode($reg);

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var lastName=<?=$lastName?>;
        document.querySelector(".slot-heading").innerHTML="Welcome "+lastName+" and choose your slot";

        // Creating function add_slots

        var  tr, td, row, cell,btn,count;
        var current_id;
        function create_cells(cells,tables,id_name,count)
        {
            tr = document.createElement('tr');
            for (cell = 0; cell < cells; cell++)
            {
                td = document.createElement('td');
                btn=document.createElement('button');
                btn.classList.add("slots");
                btn.setAttribute("id",id_name+(count+cell+1));
                td.appendChild(btn);
                tr.appendChild(td);
                btn.innerHTML=count+cell+1;
                tables.appendChild(tr);
            }
            
        }
        function add_slots(current,cells,tables,division,id_name)
        {
            count=0;

            for (row = 0; row < Math.floor(current/cells) ; row++)
            {
                create_cells(cells,tables,id_name,count*cells);
                count=count+1;
            }
            if((current%cells)!=0)
            {
                create_cells((current%cells),tables,id_name,((Math.floor(current/cells))*cells));
            }
            document.getElementById(division).appendChild(tables);
        }

        //Current Day 

        days= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

        var day=new Date().getDay();

        document.querySelector(".day").innerHTML="Day : "+days[day];
        // var day=2;

        //For Cars

        var cars_cells=5;
        if(day==5 || day==3 || day==6)
        {
            cars_cells=5;
        }

        var cars;
        cars=[25,24,25,24,24,23,24];

        var cars_table = document.createElement('table');

        var cars_current=cars[day];

        add_slots(cars_current,cars_cells,cars_table,"cars-div","car_slot");

        //For Bikes

        bikes_cells=5;
        if(day==5)
        {
            bikes_cells=5;
        }

        var bikes;
        bikes=[16,28,17,36,30,53,36];

        var bikes_table = document.createElement('table');

        var bikes_current=bikes[day];

        add_slots(bikes_current,bikes_cells,bikes_table,"bikes-div","bike_slot");

        var slotsr=<?=$arr?>;
        slotsr.forEach(element => {document.getElementById(element).style.backgroundColor="Red";document.getElementById(element).disabled=true;});

        var reg1=<?=$reg?>;
        if(reg1!="")
        {
            for (var i=0;i<cars_current+bikes_current;i++)
            {
                // console.log( document.querySelectorAll(".slots")[i]);
                document.querySelectorAll(".slots")[i].disabled=true;
            }
            document.querySelector(".slot-heading").innerHTML="Welcome "+lastName+" Your Slot is : "+<?=$reg?>;
            // document.querySelector(".booked").innerHTML="Your Slot is : "+<?=$reg?>;
            document.querySelector("#rebook-heading").style.visibility='visible';
            document.querySelector("#rebook").style.visibility='visible';
        // var flag=0
        }


        for(i=0;i<cars_current+bikes_current;i++){

            document.querySelectorAll(".slots")[i].addEventListener("click",function(event){
                    current_id=encodeURI(this.id);
                    console.log(current_id);
                    document.cookie="cname="+current_id;
                    var r= confirm("You have selected the "+this.id+"\nCan we book this slot for you");
                    if (r==true)
                    {
                        var r=confirm("Mobile Number : "+"<?php echo $_SESSION['mobile_number'] ?>\nSlot to be booked : "+this.id);
                        if(r==true)
                        {
                            $(document).ready(function()
                            {
                                    $.ajax
                                ({
                                    url: "ajax_load.php",
                                    type: "POST",
                                    data:{"current_id":current_id},
                                    success:function(res){
                                    console.log(res);}
                                })
                            })
                            document.getElementById(current_id).style.backgroundColor="Red";
                            document.getElementById(current_id).disabled=true;
                            for (var i=0;i<cars_current+bikes_current;i++){
                                console.log( document.querySelectorAll(".slots")[i]);
                                document.querySelectorAll(".slots")[i].disabled=true;
                            }
                            document.querySelector(".slot-heading").innerHTML="Welcome "+lastName+" Your Slot is : "+current_id;
                            // document.querySelector(".booked").innerHTML="Your Slot is : "+current_id;
                            document.querySelector("#rebook-heading").style.visibility='visible';
                            document.querySelector("#rebook").style.visibility='visible';
                        }
                    }
                })
        }  

        document.getElementById("rebook").addEventListener("click",function(event){
                var r=confirm("Are you sure you wanted to leave or rebook?");
                if(r==true){

                            $(document).ready(function()
                            {
                                $.ajax
                                ({
                                    url: "ajax_load1.php",
                                    type: "POST",
                                    data:{"mobile_number":current_id},
                                    success:function(res){
                                    console.log(res);}
                                })
                            })
                            document.getElementById(<?=$reg?>).style.backgroundColor="White"; 
                    for (var i=0;i<cars_current+bikes_current;i++){
                                // console.log( document.querySelectorAll(".slots")[i]);
                                document.querySelectorAll(".slots")[i].disabled=false;
                            }
                }
            })

            document.querySelector(".logout").addEventListener("click",function(event){
            var r = confirm("Are you sure you want to log out!");
            if(r==true){
                $(document).ready(function()
                {
                    $.ajax
                    ({
                        url: "logoutserver.php",
                        type: "POST",
                        success:function(res){
                        console.log(res);}
                    })
                })   
                window.location.href="index.php"; 
            }
            })

</script>
       