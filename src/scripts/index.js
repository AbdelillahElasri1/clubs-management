$(".toggle-menu").click(()=>{
    let key = 0;
    $(".menu").toggle("slow", key++ % 2);
});

$(".add-club").click(()=>{
    console.log("add club");
    let key = 0;
    $(".dialog").toggle(key++ % 2);
    $(".menu").css({'display': 'none'});
});

$(".close-add-apprenant").click(()=>{
    $(".dialog").css({'display': 'none'});
    $(".dialog-a").css({'display': 'none'});
});

$(".add-apprenant").click(()=>{
    console.log("test");
    let key = 0;
    $(".dialog-a").toggle(key++ % 2);
});

$(".show-details").click(()=>{
    $(".dialog-info").css({"display": "flex"});
});

$(".close-info").click(()=>{
    $(".dialog-info").css({"display": "none"});
});

$("input:checkbox").click((evt)=>{
    evt.target.parentNode.submit();
})