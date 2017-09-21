function ReturnAnswer(arr){
 var masts = ['xach','xar','qyap','sirt'];
 var mast = Object.keys(arr[0])[0]

 
 
  var  cartNumber = {
	'tuz':1,
	'2':2,
	'3':3,
	'4':4,
	'5':5,
	'6':6,
	'7':7,
	'8':8,
	'9':9,
	'10':10,
	'valet':11,
	'dama':12,
	'karol':13,
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