$(document).ready(function(){
 
    $("#live-search").keyup(function(){
        let input=$(this).val();
        console.log(input);
        if(input !==""){
            $.ajax({
                url:"",
                method:"",
                data:{input:input},
            })
        }
    })

})
$("#edit-item").click(function(){
    $.each($("input[name='s_check']:checked"),function(){
        if($("input[name='s_check']:checked").length===1){
            const res = window.location.href.charAt( window.location.href.length-1);
            console.log(res)
            let courentUrl
            if(res==="#"){
             courentUrl= window.location.href.slice(0,-18)
            }else{
                courentUrl= window.location.href.slice(0,-17)
            }
           window.location.replace(courentUrl +`update-item.php?id=${$(this).val()}`)
        }
    })
})
//check books for edite item
$(document).ready(function(){
    $("#S_checkAll").click(function(){
        $(".Gcheck").attr("checked",this.checked);
    })
})

//receive 
$("#receive").click(function(){
    $.each($("input[name='s_check']:checked"),function(){
        if($("input[name='s_check']:checked").length===1){
            const res = window.location.href.charAt( window.location.href.length-1);
            console.log(res)
            let courentUrl
            if(res==="#"){
             courentUrl= window.location.href.slice(0,-18)
            }else{
                courentUrl= window.location.href.slice(0,-17)
            }
           window.location.replace(courentUrl +`Receive.php?id=${$(this).val()}`)
        }
    })
});

// delet items in gestion-stock page 
$("#delet-item").click(function(){
    const element=$("input[name='s_check']:checked");
    const res = window.location.href.charAt( window.location.href.length-1);
    console.log(res)
    let courentUrl
    if(res==="#"){
     courentUrl= window.location.href.slice(0,-18)
    }else{
        courentUrl= window.location.href.slice(0,-17)
    }
    for(let i=0;i<element.length;i++){
        window.location.replace(courentUrl +`stock_actions/delet-item.php?id=${element[i].value}`)
    }
    
})

//serch filed in gestion-stock page

$(document).ready(function(){
    const resultDropdown = $(".items_searsh");
        const vv=resultDropdown.html()
    $('.search-input').on("keyup input", function(){
        /* Get input value on change */
        const inputVal = $(this).val();
        
        // var resultDropdown = $(this).siblings(".items_searsh");
        if(inputVal.length >0){
            $.get("stock_actions/items-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
               
            });
        } else{
            //resultDropdown.empty();
            resultDropdown.html(vv);
        }
       
    });
   
});