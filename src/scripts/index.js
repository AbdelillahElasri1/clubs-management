$(".toggle-menu").click(()=>{
    key = 0;
    $(".menu").toggle("slow", key++ % 2);
});

$(".add-club").click(()=>{
    console.log("add club");
    key = 0;
    $(".dialog").toggle(key++ % 2);
});