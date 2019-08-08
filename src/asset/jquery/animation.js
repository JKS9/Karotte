$(document).ready(function(){

    /** animation slide products colmun **/
    $( "#products_display" ).hide();
    $("#minimis_products").click(function(){
        $( "#products_display" ).slideToggle( "slow" );
    });

    /** animation slide region colmun **/
    $( "#region_display" ).hide();
    $("#minimis_region").click(function(){
        $( "#region_display" ).slideToggle( "slow" );
    });

    /** animation slide prix colmun **/
    $( "#prix_display" ).hide();
    $("#minimis_prix").click(function(){
        $( "#prix_display" ).slideToggle( "slow" );
    });

    /** animation slide products colmun **/
    $( "#poids_display" ).hide();
    $("#minimis_poids").click(function(){
        $( "#poids_display" ).slideToggle( "slow" );
    });



});
