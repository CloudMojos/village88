// function makeItBig(arr){
//  return arr.map(i => i > 0? "big" : i)
// }

// console.log(makeItBig([-1,3,5,-5]))

// function returnArrayCountGreaterThanY(arr, y){
//     return arr.reduce(((c, i) => {
//         if (i > y){
//             c++
//         }
//         return c
//     }), 0)
// }
// console.log(returnArrayCountGreaterThanY([5,2,3,4,6], 4))

// function factorial(num) {
//     if (num <= 1) {
//         return num
//     }

//     return factorial(num - 1) * num
// }

// console.log(factorial(5))

// function swapTowardCenter(arr) {
//     // return 
// }

// let num = 10
// let sum = 0
// for (let i = 0; i < num; i++) {
//     if (i % 3 == 0 || i % 5 == 0) { break }
    
//     sum += i
// }

// console.log(sum)

// function fibonacci(index){
//     // Enter code below
//     // Error check
//     if (index < 0) {
//         console.log("Enter number greater than 0")
            // return
//     }
//     // Base case
//     if (index === 0 || index === 1) {
//         return index    
//     }
//     // Recursive case
//     return fibonacci(index - 1) + fibonacci(index - 2)
// }

// console.log(fibonacci(-1))

// console.log([928].join().split('').map(i => Number(i)).reduce((a, c) => a += c))

// function sumToOne(num) {
//     num = [num]
//     // While sum is not of length 1,
//     // reduce to find sum.
//     while (String(num).length > 1) {
//         num = [num.join().split('').map(i => Number(i)).reduce((a, c) => a += c)]
//     }
//     return num[0]
// }
// console.log(sumToOne(928))

// // console.log([9].join().split(''))

// function clockHandAngles(seconds) {
//     // Enter code below
// // This one is different from others as it requires understanding of how clock hand degrees is converted to time, in hours, minutes and seconds. I might search for the formula for this.
// // Actually, no. Let's start by thinking this through.
// // 0 seconds is [0, 0, 0]
// // 1 second isn't [1, 0, 0]. It's probably [0, 0, 1] since index 2 is seconds. I will also assume that 120 seconds is [0, 0, 120].
// // ...  We're making progress.

// // We actually made a mistake. 120 seconds isn't just [0, 0, 120]. Minute hand is also supposed to move.

// // 1 hour is 3600 seconds.
// // 1 minute is 60 seconds.
// // 3600 seconds is 30 degrees.

// // let second_hand = seconds % 360
// // let minute_hand = (seconds / 60) % 360
// // let hour_hand = (seconds / 3600) % 360

// // using 360 is wrong. what should I use?

// let seconds_hand = seconds % 60 // more than 60 just means 1 minute
// let minutes_hand = (seconds / 60) % 60 // more than 60 just means  1 hour
// let hours_hand = (seconds / 3600) % 12 // more than 12am just means 1pm (analog clock things)

// return [Math.round(hours_hand * 30), Math.round(minutes_hand * 6), Math.round(seconds_hand * 6)]

// // remember that the "1 hour" in the clock is 5 minutes. It means 5 minutes is 30 degrees as well as 1 hour. 30 degrees for an hour is given in the problem.
// // I found the 6 in minutes and seconds just by trial and error. I started off with 60, then corrected it to 6.

// }

// console.log(clockHandAngles((5000)))

// function isPrime(num) {
//     if (num === 2) { return true }
//     for (let i = 2; i < num; i++) {
//         if (num % i == 0) {
//             return false
//         }
//     }
//     return true
// }

// console.log(isPrime(65))

// let num = 1984.5
// num = String(num)

// digit = 1

// console.log(String(num)[(String(num).length - 1) - digit])


// function filterRange(arr, min, max) {
//     for (let i = 0, last = 0; i < arr.length; i++) {
//         if (min < arr[i] < max) {
//             arr[last] = arr[i]
//             last++;
//         }
//     }
// return arr
// }

// function arrayConcat(arr1, arr2) {
//     // Enter code below
//     let arr = []
//     let arrIndex = 0
//     for (let i = 0; i < arr1.length; i++) {
//         arr[arrIndex] = arr1[i]   
//         arrIndex++ 
//     }

//     for (let i = 0; i < arr2.length; i++) {
//         arr[arrIndex] = arr2[i]    
//         arrIndex++
//     }

//     return arr
// }

// console.log(arrayConcat([1,2], [3,4]))

// function heights(arr) {
//     let tallest = 1
//     let whatISee = []
//     for (let i = 0; i < arr.length; i++) {
//         if (arr[i] >= tallest) {
//             if (whatISee[whatISee.length - 1] >= arr[i]) { continue }
//             whatISee[whatISee.length] = arr[i]
//             tallest = arr[i]
//         }
//     }

//     return whatISee
// }
// heights([-1, 1, 1, 7, 3]) 
// console.log(heights([-1, 1, 1, 7, 3]))

// function nToLast(arr, n) {
//     return arr[arr.length - n] !== undefined ? arr[arr.length - n] : null
// }

// console.log(nToLast([5,2,3,6,4,9,7], 3))


// function isCreditCardValid(digitArr) {
//     // Enter code below
//     let value = 0
//     let lastDigit = digitArr.pop()

//     digitArr = digitArr.map((e, i) => {
//         if (i % 2 !== 0) {
//             let newValue = e * 2
//             return newValue > 9? newValue - 9 : newValue
//         }
//         return e
//     })

//     value = digitArr.reduce((a, e) => a += e)

//     return (value + lastDigit ) % 10 === 0
// }

// isCreditCardValid([5, 2, 2, 8, 2])

// function zipIt(arr1, arr2) {
//     let arr = []
//     let i = 0
//     let j = 0, k = 0

//     while (j < arr1.length || k < arr2.length) {
//         if (j < arr1.length) {
//             arr[i] = arr1[j]
//             i++
//             j++
//         }
//         if (k < arr2.length) {
//             arr[i] = arr2[k]
//             i++
//             k++
//         }
//     }

//     return arr
// }

// console.log(zipIt([1, 2], ['a', 'b', 'c', 'd']))


// function parensValid(str) {
//     // Enter code below
//     let opening = [], closing = []

//     for (let i = 0; i < str.length; i++) {
//         console.log(str[i])
//         if (str[i] == '(') {
//             opening.push('(')
//         }
//         else if (str[i] == ')') {
//             closing.push(')')  
//             if (opening[0] && closing[0]) {
//                 opening.length -= 1
//                 closing.length -= 1
//             }
//         }
//     }
//     return opening.length === 0 && closing.length === 0
// }

// console.log(parensValid("((()))()"))


// function bubbleSort(arr) {
//     for (let i = 0; i < arr.length; i++) {
//         for (let j = 0; j < arr.length; j++) {
//             if (arr[i] < arr[j]) {
//                 temp = arr[i]
//                 arr[i] = arr[j]
//                 arr[j] = temp
//             }
//         }
//     }
    
//     return arr
// }

// console.log(bubbleSort([5,2,1,3]))

// // [5,2,1,3]

// [5] > [2]

// [2, 5, 1, 3]


