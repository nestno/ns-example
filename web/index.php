<?php
// new PDO('mysql:host=127.0.0.1;port=3306;dbname="yipeidashi";charset=utf8','abing','1234567');
// phpinfo();
// $a = $b = 3;
// // $b = 4;
// var_dump($a);
// var_dump($b);
// class a {
//     static protected $class = 'a class';
//     public function showClass(){
//         echo static::$class;
//         echo '<br>';
//         echo self::$class;
//         echo '<br>';
//     }
// }
// class b extends a{
//     static protected $class = 'b class';
// }
// $b = new b();
// $a = new a();
// $a->showClass();
// $b->showClass();
// 正向预查
// replace(/\d{1,3}(?=(\d{3})+$)/g, '$&,');
// $reg = "/\d{1,3}(?=(\d{3})+$)/U";
// $reg = "/(?<=[0-9])(?=(?:[0-9]{3})+(?![0-9]))/";

// preg_match_all($reg,'199999999999999',$arr);
// // preg_match($reg,'199999999999999',$arr);
// var_dump($arr);
// echo preg_replace($reg,',','1999999262399999');

// preg_match($reg,'999999999999',$arr);
// var_dump($arr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>防抖与节流</title>
</head>
<body>
    <form action="index.php" method="get">
        <input type="search" name="fd" id="fd">
        <input type="submit" value="提交">
    </form>

<script>
    let fd = document.getElementById('fd');
    // 防抖封装
    function debounce(fn,delay,option){
        let timer
        if(!option) option = {}
        leading = option.leading || false
        result = option.result || null
        let handleFn = function(){
            let event = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
            if(event.target.composing) return
            if(timer) clearTimeout(timer)
            let _this = this;
            let _arguments = arguments;
            if(leading){
                let isInvoke = false;
                if(!timer){
                    callFn(_this,_arguments);
                    isInvoke = true;
                }
                timer = setInterval(() => {
                    timer = null;
                    if(!isInvoke){
                        callFn(_this,_arguments);
                    }
                }, delay);
            }else{
                timer = setTimeout(() => {
                    callFn(_this,_arguments);
                }, delay);
            }

        }
        function callFn(context,arguments){
            let res = fn.apply(context,arguments)
            if(result && typeof result == "function"){
                result(res)
            }
        }
        handleFn.cancel = function(){
            if(timer) clearTimeout(timer)
        }
        return handleFn
    }
    // 节流封装
    function throttle(fn,interval,option){
        let last = 0
        let timer = null
        if(!option) option = {}
        let trailing = option.trailing || false

        let result = option.result || null

        let handleFn = function(){
            let _this = this;
            console.log(this)
            let _arguments = arguments;
            let now = new Date().getTime();

            if(now - last > interval){
                if(timer){
                    clearTimeout(timer)
                    timer = null
                }
                callFn(_this,_arguments)
                last = now
            }else if(timer === null && trailing){
                timer = setTimeout(() => {
                    timer = null
                    callFn(_this,_arguments)
                }, interval);
            }
        }
        function callFn(context,arguments){
            let res = fn.apply(context,arguments);
            if(result && typeof result == 'function'){
                result(res)
            }
        }
        handleFn.cancel = function(){
            if(timer) clearTimeout(timer)
            timer = null
        }
        return handleFn
    }
    function onCompositionStart(e){
        e.target.composing = true
    }
    function onCompositionEnd(e){
        e.target.composing = false
        var event = document.createEvent('HTMLEvents')
        event.initEvent('input')
        e.target.dispatchEvent(event)
    }
    // fd.oninput = debounce(function(){
    //     return this.value
    // },500,{result:function(data){
    //     console.log(data)
    // }});
    fd.oninput = throttle(function(){
        return this.value
    },3000,{result:function(data){
		console.log(data)
        console.log(888)
    }})

    fd.addEventListener('compositionstart',onCompositionStart)
    fd.addEventListener('compositionend',onCompositionEnd)

    // fd.addEventListener('input',debounce(function(){
    //     console.log(this.value)
    // },3000,true))

</script>
</body>
</html>
