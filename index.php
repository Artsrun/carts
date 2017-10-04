<?php 
/*.apsc-xing-embed iframe{
	visibility: visible !important;
	width:auto !important;
	height: auto !important;
	
	}*/



?>

<!DOCTYPE hrml>
<html>
    <head>
 <link rel="stylesheet" type="text/css" href="cards.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	
 function ReturnAnswer(arr){
 var masts = ['clubs','spades','diams','hearts'];
 var mast = Object.keys(arr[0])[0]

 
 
  var  cartNumber = {
	'a':1,
	'2':2,
	'3':3,
	'4':4,
	'5':5,
	'6':6,
	'7':7,
	'8':8,
	'9':9,
	'10':10,
	'j':11,
	'q':12,
	'k':13,
   }
 
function CustomIndexOf(arr,obj){
var index = -1;
 for(var i =0;i<arr.length;i++){
if(JSON.stringify(arr[i])==JSON.stringify(obj)){
index = i;
}

} 
return index;
	}
	
 
 function compare(a,b) {
  if (Object.keys(a)[0] == Object.keys(b)[0] && cartNumber[Object.values(a)[0]] < cartNumber[Object.values(b)[0]] ||(Object.keys(a)[0] != Object.keys(b)[0] && masts.indexOf(Object.keys(a)[0])< masts.indexOf(Object.keys(b)[0])) ){
    return -1;
}
  if (Object.keys(a)[0] == Object.keys(b)[0] && cartNumber[Object.values(a)[0]] > cartNumber[Object.values(b)[0]] ||(Object.keys(a)[0] != Object.keys(b)[0] && masts.indexOf(Object.keys(a)[0])> masts.indexOf(Object.keys(b)[0])) ){

}
    return 1;
  return 0;
}
 
  
  var numbersArray = [0,'012','021','102','120','201','210'];


  var originalArr=arr.slice(0);
  originalArr.shift();
  var sortedArr=originalArr.slice(0);
  sortedArr.sort(compare);
  var numb = '';
  for(var i =0;i<originalArr.length;i++){
 
  numb+=CustomIndexOf(sortedArr,originalArr[i]);
  
  }
  
var startPoint = cartNumber[Object.values(arr[0])[0]];
var cartKeysArr = Object.keys(cartNumber);
var cartValuesArr = Object.values(cartNumber);

numberToAdd = numbersArray.indexOf(numb);
 var cartNumber = startPoint+numberToAdd;
 cartNumber = cartNumber > 13 ? cartNumber-13: cartNumber;
 var returnedObj ={};
 returnedObj[mast]=cartKeysArr[cartValuesArr.indexOf(cartNumber)]
 return returnedObj;
 }
 
 
 
 
(ReturnAnswer( [{clubs:'a'},{clubs:'6'},{clubs:'8'},{clubs:'k'}]))
 
</script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('.options').addClass('active');
        $('.toggle li').click(function(){
            $('.playingCards').toggleClass($(this).text());
        });
        $('.lang li').click(function(){
            $('html').attr('lang', $(this).text());
            $('html').attr('xml:lang', $(this).text());
        });
		
		
		
		$('.card').click(function(){
		if($('.selected .table li').length==4){ 
		alert('Maximum selected cart number is 4')
		return false;
		}
		var new_obj = $(this).closest('li').clone().addClass('.ui-state-default');
        $('.selected .table').append(new_obj)


    });
	
	  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  
  
  $('.btn').click(function(){
  if($('.selected .table li').length!=4){
  alert('Select 4 cart for actions');
  return false;
  }
  $('.found .table').empty();
  
  var carts = [];
 
  $('.selected li label').each(function(){
  
 var classes =  $(this).attr("class").split(' ');
 var cart_number = classes[1].substring(5);
 var cart_suit = classes[2];
 var cart_obj={};
 cart_obj[cart_suit]=cart_number;
 carts.push(cart_obj)
  
  })

   var result = ReturnAnswer(carts);
  var cart_suit = Object.keys(result)[0];
  var cart_number = Object.values(result)[0];
  	var new_obj = $('.cart-wrap label.rank-'+cart_number+'.'+cart_suit).closest('li').clone();
	 $('.found .table').append(new_obj);
  
  })
  
    $('.clear_btn').click(function(){
	 $('.found .table').empty();
	 $('.selected .table').empty();
	})

	
	
	$('.delete').click(function(){
	$('.selected  label.selected-cart').closest('li').remove();
	
	})
	
	})
	
	
	$(document).on('click','.selected label',function(){
	
	if($(this).hasClass('selected-cart') ){
	 $(this).removeClass('selected-cart')
	}else{
	 $(this).addClass('selected-cart')
	}
	
	})
	
    </script>
    </head>
	
	<style>
.wrap{
	font-size:0;
	padding-top: 20px;
	min-width: 430px;
    overflow: auto;
	}
.actions,.cart-wrap{
	font-size:17px;
	display:inline-block;
	}
.cart-wrap{
	width:70%;
	}
.actions{
	vertical-align:top;
	width:30%;
	 }
	 .found{
	 padding-left:3px;
	 }
.btn {
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Georgia;
  color: #ffffff;
  font-size: 17px;
  background: #3498db;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  cursor:pointer;
  display: inline-block;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
 
}
.button-wrap{
text-align: center;

}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.clear_btn {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}
.button:hover{
 background-color: black;
 color:#fff;
}
	.apsc-xing-embed iframe{
    visibility: visible !important;
    width:auto !important;
    

}
.delete{
       display: inline-block;
    height: 33px;
    width: 90px;
    border: 5px dashed #ccc;
    vertical-align: bottom;
    font-size: 25px;
    font-weight: 900;
    color: #ccc;
    text-align: center;
    padding-top: 3px;
}
.delete:hover{
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
	cursor:pointer;
	color:rgba(11, 16, 8, 0.6);
	border-color:rgba(11, 16, 8, 0.6);;
}
.selected-cart{
box-shadow: inset 0 0 0 0px #fff, 0 0 0 3px #1e8cbe !important;
}
.selected-cart:before {
     content: '\2713';
    position: absolute;
    top: -12px;
    right: -7px;
    overflow: hidden;
    height: 17px;
    width: 18px;
    line-height: 13px;
    color: #fff;
    display: inline-block;
    background: #1e8cbe;
    padding-top: 2px;
	}
</style>
    <body class="playingCards fourColours rotateHand">
	
<div class="wrap">
<div class="actions">
<div id="button-wrap">
          <span class="btn">Find Cart</span>
		  <button class="button clear_btn">Clear</button>
		  <span class="delete">Delete</span>
        </div>
		
<div class="selected">
<ul id="sortable" class="table"></ul>
</div>
<div class="found">
<ul class="table"></ul>
</div>
</div>
<div class="cart-wrap">


    <ul class="table">
        <li>
            <label class="card rank-2 hearts"><span class="rank">2</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-3 hearts"><span class="rank">3</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-4 hearts"><span class="rank">4</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-5 hearts"><span class="rank">5</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-6 hearts"><span class="rank">6</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-7 hearts"><span class="rank">7</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-8 hearts"><span class="rank">8</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-9 hearts"><span class="rank">9</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-10 hearts"><span class="rank">10</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-j hearts"><span class="rank">J</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-q hearts"><span class="rank">Q</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-k hearts"><span class="rank">K</span><span class="suit">&hearts;</span></label>
        </li>
        <li>
            <label class="card rank-a hearts"><span class="rank">A</span><span class="suit">&hearts;</span></label>
        </li>
    </ul>

    <ul class="table">
        <li>
            <label class="card rank-2 spades"><span class="rank">2</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-3 spades"><span class="rank">3</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-4 spades"><span class="rank">4</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-5 spades"><span class="rank">5</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-6 spades"><span class="rank">6</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-7 spades"><span class="rank">7</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-8 spades"><span class="rank">8</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-9 spades"><span class="rank">9</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-10 spades"><span class="rank">10</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-j spades"><span class="rank">J</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-q spades"><span class="rank">Q</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-k spades"><span class="rank">K</span><span class="suit">&spades;</span></label>
        </li>
        <li>
            <label class="card rank-a spades"><span class="rank">A</span><span class="suit">&spades;</span></label>
        </li>
    </ul>
 <ul class="table">
        <li>
            <label class="card rank-2 diams"><span class="rank">2</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-3 diams"><span class="rank">3</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-4 diams"><span class="rank">4</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-5 diams"><span class="rank">5</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-6 diams"><span class="rank">6</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-7 diams"><span class="rank">7</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-8 diams"><span class="rank">8</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-9 diams"><span class="rank">9</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-10 diams"><span class="rank">10</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-j diams"><span class="rank">J</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-q diams"><span class="rank">Q</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-k diams"><span class="rank">K</span><span class="suit">&diams;</span></label>
        </li>
        <li>
            <label class="card rank-a diams"><span class="rank">A</span><span class="suit">&diams;</span></label>
        </li>
    </ul>
    <ul class="table">
        <li>
            <label class="card rank-2 clubs"><span class="rank">2</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-3 clubs"><span class="rank">3</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-4 clubs"><span class="rank">4</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-5 clubs"><span class="rank">5</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-6 clubs"><span class="rank">6</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-7 clubs"><span class="rank">7</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-8 clubs"><span class="rank">8</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-9 clubs"><span class="rank">9</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-10 clubs"><span class="rank">10</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-j clubs"><span class="rank">J</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-q clubs"><span class="rank">Q</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-k clubs"><span class="rank">K</span><span class="suit">&clubs;</span></label>
        </li>
        <li>
            <label class="card rank-a clubs"><span class="rank">A</span><span class="suit">&clubs;</span></label>
        </li>
    </ul></div></div>
	  </body>
</html>
