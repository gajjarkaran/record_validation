<html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script data-main="scripts/main" src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="main.js"></script>

    <body>
        <p id="txt"></p>
        <?php           
            $f_temp=$_FILES["file1"]["tmp_name"];
            $f_name=$_FILES["file1"]["name"];
            move_uploaded_file($f_temp,"uploads/".$f_name);            
            $out = shell_exec("python python/demo1.py $f_name");
            $final=chop($out);                        
        ?>
    </body>
    <script>        
        web3=new Web3(web3.currentProvider);
        eth = web3.eth;
        personal=web3.eth.personal;
        async function sendTrans() {            
            const d="<?php echo $final;?>";
            console.log(d);
            eth.sendTransaction(
            {
            from:"",//Provide From address key    
            to: "", // Provide To address key
            value: "", // Provide amount of ether
            input: d,
            gas: 100000 
        }).then(console.log);
        }
        sendTrans();

    </script>
</html>