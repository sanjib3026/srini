/**
 *   Usage:  format_number(12345.678, 2);
 *   result: 12345.68
 **/
function format_number(pnumber, decimals) {
    if (isNaN(pnumber)) {
        return 0;
    }
    if (pnumber == '') {
        return 0;
    }

    var snum = new String(pnumber);
    var sec = snum.split('.');
    var whole = parseFloat(sec[0]);
    var result = '';

    if (sec.length > 1) {
        var dec = new String(sec[1]);
        dec = String(parseFloat(sec[1]) / Math.pow(10, (dec.length - decimals)));
        dec = String(whole + Math.round(parseFloat(dec)) / Math.pow(10, decimals));
        var dot = dec.indexOf('.');
        if (dot == -1) {
            dec += '.';
            dot = dec.indexOf('.');
        }
        while (dec.length <= dot + decimals) {
            dec += '0';
        }
        result = dec;
    } else {
        var dot;
        var dec = new String(whole);
        dec += '.';
        dot = dec.indexOf('.');
        while (dec.length <= dot + decimals) {
            dec += '0';
        }
        result = dec;
    }
    return result;
}

function compute_magnitude(magnitude) {
    var ret = {};
    var multiplier;
    var color = '#000';
    magnitude = Math.round((magnitude ) * 10) / 10;
    if      (magnitude >= 6.5) { color = "#ff0000"; multiplier = 4; }
    else if (magnitude >= 6.0) { color = "#FF7D11"; multiplier = 3; }
    else if (magnitude >= 5.0) { color = "#0055BB"; multiplier = 2; }
    else                       { color = "#4C9E00"; multiplier = 1; }
    ret.magnitude = multiplier * parseFloat(magnitude) * 2000;
    
    ret.color = color;
   
    return ret;
}
function compute_hmagnitude(magnitude,depth) {

    var ret = {};
    var multiplier;
    var color = '#000';

    if      (magnitude >= 6.5) {  multiplier = 4; }
    else if (magnitude >= 6.0) {  multiplier = 3; }
    else if (magnitude >= 5.0) {  multiplier = 2; }
    else                       {  multiplier = 1; }

    if      (depth < 70 ) { color = "#ffffff"; }		
    else if (depth > 70 && depth < 300) { color = "#9c9c9c"; }
    else                       { color = "#4a4a4a"; }
    
    ret.magnitude = multiplier * parseFloat(magnitude) * 2000;
    ret.color = color;		
    return ret;


    // var ret = {};
    // var multiplier;
    // var color = '#000';

    // if      (magnitude >= 6.5) {  multiplier = 4; }
    // else if (magnitude >= 6.0) {  multiplier = 3; }
    // else if (magnitude >= 5.0) {  multiplier = 2; }
    // else                       {  multiplier = 1; }

    // if      (depth < 70 ) { color = "#f7f5f5"; }		
    // else if (depth >= 70 && depth < 300) { color = "#9c9c9c"; }
    // else                       { color = "#4a4a4a"; }



    
    // ret.magnitude = multiplier * parseFloat(magnitude) * 2000;
    // ret.color = color;		
    // return ret;
}
function getRGB(color){

    var ncolor = "255, 255, 255";
    if      (color == "#ff0000") { ncolor = "252, 129, 129"    ; }
    else if (color == "#FF7D11") { ncolor = "247, 181, 126" ; }
    else if (color == "#0055BB") { ncolor = "120, 179, 250"   ; }
    else                         { ncolor = "124, 173, 78"   ; }

    return ncolor;
}

function getCoordinates(latlng){
    var lat = latlng.lat; lat = lat.toFixed(5);
    var lng = latlng.lng; lng = lng.toFixed(5);

    return [lat, lng];
}

function notify(type, message){
    $.growl({
        icon: "far fa-dot-circle",
        title: '',
        message: message,
        url: ''
    },{
        element: 'body',
        type: (type == "earthquake" ? "danger" : type),
        allow_dismiss: true,
        placement: {
            from: 'top',
            align: 'right'
        },
        offset: {
            x: 30,
            y: 30
        },
        spacing: 10,
        z_index: 999999,
        delay: 2500,
        timer: (type == "earthquake" ? 15000 : 5000),
        url_target: '_blank',
        mouse_over: false,
        animate: {
            enter: 'animated fadeIn',
            exit: 'animated fadeOut'
        },
        icon_type: 'class',
        template: '<div data-growl="container" class="alert" role="alert">' +
        '<button type="button" class="close" data-growl="dismiss">' +
        '<span aria-hidden="true">&times;</span>' +
        '<span class="sr-only">Close</span>' +
        '</button>' +
        '<span data-growl="icon"></span>' +
        '<span data-growl="title"></span>' +
        '<span data-growl="message" class="pl-2"></span>' +
        '<a href="#" data-growl="url"></a>' +
        '</div>'
    });
};
