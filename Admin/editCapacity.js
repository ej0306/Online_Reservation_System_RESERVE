function changeCapacity() { //create a button that calls this function. Will pass the input value to capacityHandler.php file
    var capacityNumber = prompt("What would you like to change the restaurant capacity to?","100");
    var maxCapacity = parseInt(capacityNumber);
    if(capacityNumber != null) {
        if (isNaN(capacityNumber)) {
            alert("Must input numbers");
            return false;
        }
        window.location.href = "capacityHandler.php?maxCap=" + maxCapacity;
        alert("Max capacity is now " + capacityNumber);
    }
}