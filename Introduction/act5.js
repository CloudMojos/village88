function countGreaterThanY(arr, Y){
    let count = 0;
    for(let i = 0; i < arr.length; i++){
       if(arr[i] > Y){
          count++;
       }
    }
    console.log(count);
 }
 countGreaterThanY([1,2,3], 2); // should log 1
 countGreaterThanY([2,5,8], 5); // should log 1

 function printMaxMinAvg(arr){
    let max = arr[0];
    let min = arr[0];
    let sum = arr[0];
    for(let i = 1; i < arr.length; i++){
       if(arr[i] > max){
          max = arr[i];
       }
       if(arr[i] < min){
          min = arr[i];
       }
       sum += arr[i];
    }
    let avg = sum / arr.length;
    console.log(`Max: ${max}, Min: ${min}, Average: ${avg}`);
 }
 printMaxMinAvg([1,2,3]); // should log "Max: 3, Min: 1, Average: 2"
 printMaxMinAvg([2,5,8]); // should log "Max: 8, Min: 2, Average: 5"

 function replaceNegatives(arr){
    for(let i = 0; i < arr.length; i++){
       if(arr[i] < 0){
          arr[i] = "Dojo";
       }
    }
    return arr;
 }
 console.log(replaceNegatives([1,2,-3,-5,5])); // should log [1,2,"Dojo","Dojo",5]
  
 function removeVals(arr, start, end){
    let shift = end - start + 1;
    for(let i = start; i <= end; i++){
       arr[i] = arr[i + shift];
    }
    arr.length -= shift;
    return arr;
 }
 console.log(removeVals([20,30,40,50,60,70],2,4)); // should log [20,30,70]
 