const task1 = document.querySelector("#task1");
const task2 = document.querySelector("#task2");
const task3 = document.querySelector("#task3");
const task4 = document.querySelector("#task4");
const task5 = document.querySelector("#task5");

console.log(resorts);


// if i want to print the all the matching cities  
let machitingcities =[]



const task1element = document.querySelector("#task1"); // Corrected variable name
let citysearch = null; // Fixed variable name to use consistently

for (let i = 0; i < resorts.length; i++) {
    const resort = resorts[i];

    if ((resort.country == "Switzerland" || resort.country == "France") && (resort.skiSlopeLength > 200)) {
        // Properly checking conditions
        // citysearch = resort; // Assigning the matched resort
        // break; // Exit loop after finding the first match


        machitingcities.push(`${resort.city}, ${resort.country}`);
    }
}

// if (citysearch) {
if(machitingcities.length >0){
    // task1element.textContent = `${citysearch.city}, ${citysearch.country}`; // Corrected capitalization of textContent
    task1element.textContent = machitingcities.join("; "); 
} else {
    task1element.textContent = "No city found"; // Fixed capitalization of textContent
}



// write the name of the city that has hight point below then 2000m 
const task2elemenet  =document.querySelector("#task2")

const list =document.createElement("ul");

let hasMatchingcities = false ;
for(let i =0 ;i < resorts.length ;i++){
    const resort = resorts[i];
    if(resort.highestPoint < 2000) {
        const listItem = document.createElement("li");
        listItem .textContent =`${resort.city}`;
        list.appendChild(listItem);
        hasMatchingcities =true;

    }

}
if(hasMatchingcities){
    task2elemenet.appendChild(list);
}else{
    task2elemenet.textContent ="No cities found with  a  highest point below 2000m";
}


// c. (2 points) In the element with id task3 , write the name of a city that has the longest ski slope system!

const task3element =document.querySelector("#task3")

// 
let updatecity  = resorts[0].city;
let  max =0;
for(let i =0; i<resorts.length ;i++){
    const resort =resorts[i];
    if (resort.skiSlopeLength > max) {
        max = resort.skiSlopeLength; // Update max
        updatecity = resort.city; // Update city
    }
}
task3element.textContent = `${updatecity} , ${max } km`;


//Is it true that every city has at least 40 km of ski slopes?
const task4element =document.querySelector("#task4");

// const allcheak = resorts.every((resort) => resort.skiSlopeLength >= 40);

// let allcheak =true ;
// for (let i =0;i <resorts.length ;i++) {
//     if(resorts[i].skiSlopeLength < 40 ){
//         allcheak =false ;
//         break;
//     }

// }

// task4element.textContent =allcheak;

// Filter for cities with ski slopes less than 40 km
const citiesWithShortSlopes = resorts.filter((resort) => resort.skiSlopeLength < 40);

// If the filtered array is empty, all cities have at least 40 km slopes
const allCheck = citiesWithShortSlopes.length === 0;

task4element.textContent = allCheck;


//Calculate how many cities are represented in the list for each country

const task5element = document.querySelector("#task5");

// Create an object to store the counts of cities for each country
const countryCityCount = {};

// Iterate through the resorts array
for (let i = 0; i < resorts.length; i++) {
    const country = resorts[i].country;

    // Increment the count for the country, or initialize it if not present
    if (countryCityCount[country]) {
        countryCityCount[country]++;
    } else {
        countryCityCount[country] = 1;
    }
}

// { Switzerland: 2, France: 2, Italy: 1 }
// [["Switzerland", 2], ["France", 2], ["Italy", 1]]

// Format the results into the desired format
const result = Object.entries(countryCityCount)
    .map(([country, count]) => `(${country}, ${count})`)
    .join(", ");

// Display the result in the task5element
task5element.textContent = result;
