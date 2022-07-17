let test = true;
let id;
   
//$("li").click(function(){
$("ul").on("click", "li", function(){
    if (test) {
        $(this).addClass("active");
        $(this).attr('id', '1');
        id = $(this).attr('id');
        console.log(id);
        test = false;
    } else if ($(this).attr('id')=='1') {
        $(this).attr('id', '0');
        $(this).removeClass("active");
        test = true;
        console.log(id);
    } else {
        $("#"+id).removeClass("active");
        $("#"+id).attr('id', '0');
        $(this).addClass("active");
        $(this).attr('id', '1');
        id = $(this).attr('id');
        test = false;
        console.log(id);
    }
});

$("#add1").click(function(){
    if ($('#in1').val()!="") {
        $("ul").append("<li class=\"list-group-item\">"+$('#in1').val()+"</li>");
        $('#in1').val("");
    }
})

$("#rem1").click(function(){
    if (!test) {
        $("#"+id).remove();
    }
})

let index = 1;

$("#add2").click(function(){
    if ($('#in2').val()!=""&&$('#1').text()!="") {
        let time = new Date();
        $("tbody").append("<tr>"+"<td>"+index+"</td>"+"<td>"+$('#in2').val()+"</td>"+"<td>"+$('#1').text()+"</td>"+"<td>"+time+"</td>"+"</tr>");
        $('#in2').val("");
        index++;
    }
})

$("table").on("click", "td", function(){
    if ($(this).parent().hasClass("table-danger")) {
        $(this).parent().removeClass("table-danger");
    } else {
        $(this).parent().addClass("table-danger")
    }
});

$("#rem2").click(function(){
    var elements = document.getElementsByClassName("table-danger");
    while(elements.length > 0){
        elements[0].parentNode.removeChild(elements[0]);
    }
})