function resetNegatives(arr){
    for(let i = 0; i < arr.length; i++){
       if(arr[i] < 0){
          arr[i] = 0;
       }
    }
    return arr;
 }
 
 function moveForward(arr){
    for(let i = 0; i < arr.length - 1; i++){
       arr[i] = arr[i + 1];
    }
    arr[arr.length - 1] = 0;
    return arr;
 }
 
 function returnReversed(arr){
    let reversedArr = [];
    for(let i = arr.length - 1; i >= 0; i--){
       reversedArr.push(arr[i]);
    }
    return reversedArr;
 }
 
 function repeatTwice(arr){
    let newArr = [];
    for(let i = 0; i < arr.length; i++){
       newArr.push(arr[i]);
       newArr.push(arr[i]);
    }
    return newArr;
 }
 
 console.log(resetNegatives([1,2,-1,-3])); // should log [1,2,0,0]
 console.log(moveForward([1,2,3])); // should log [2,3,0]
 console.log(returnReversed([1,2,3])); // should log [3,2,1]
 console.log(repeatTwice([4,"Ulysses",42,false])); // should log [4,4,"Ulysses","Ulysses",42,42,false,false]
 