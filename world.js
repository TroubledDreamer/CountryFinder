document.addEventListener("DOMContentLoaded", function() {


    


    const buttonCounties = document.getElementById('lookup');
    const buttonCities = document.getElementById('lookupCs');
    const resultContainer = document.getElementById('result');
    var countryName = document.getElementById('country');
    
    function fetcher(urlParameter){
        

        console.log(urlParameter);

        fetch("world.php" + urlParameter)
            .then(response => response.text())
            .then(data => {
                resultContainer.innerHTML = data;
    

            }
            ) 
            .catch(error => console.error("Error", error));

    }


    buttonCities.addEventListener( 'click', function (){
        
        var urlParameter = '?country=' + countryName.value + "&lookup=cities";
        fetcher(urlParameter);


    })



    buttonCounties.addEventListener( 'click', function (){
        var urlParameter = '?country=' + countryName.value;
        fetcher(urlParameter);
    })










})