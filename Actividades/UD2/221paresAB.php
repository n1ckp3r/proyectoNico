
<form action="" method="get">
    <p>
        <label for="principio">Comienzo</label>
        <input type="text" id="principio" name="principio">
    </p>

    <p>
        <label for="final">Final</label>
        <input type="text" name="final" id="final">
    </p>
    <p>
        <input type="submit">
    </p>
    
</form>

<?php
    if (!empty($_GET["principio"] && !empty($_GET["final"]))) {
        $principio = $_GET["principio"];
        $final = $_GET["final"];
        
        echo "<ul>";
        for ($i=$principio; $i <= $final; $i++) { 
            if ($i%2==0) {
                //echo "<ul>";
                echo "<li>$i</li>";   
            }
        }
        echo "</ul>";
    }
?>