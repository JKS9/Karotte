$(document).on('change', '#checkFarmer', function () {
    let produitsFarmer =  $('input[name="produitsFarmer"]:checked').val();
    let departmentFarmer =  $('input[name="departmentFarmer"]:checked').val();

    produitsFarmer = (produitsFarmer !== undefined) ? 'produits='+produitsFarmer+'-' : '';
    departmentFarmer = (departmentFarmer !== undefined) ? 'department='+departmentFarmer+'-' : '';

    console.log(produitsFarmer);
    console.log(departmentFarmer);

    let urlfarmers = 'http://localhost/Karotte/Farmers/'+produitsFarmer+departmentFarmer;

    $('#linksFarmers').html(urlfarmers);

    $('#linksFarmers').attr("href", urlfarmers);

});