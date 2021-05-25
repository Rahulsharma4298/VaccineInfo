<?php
require("process.php");
include("include/header.php");
?>
<section id="menu">
        <div class="container">
            <!-- Nav tabs -->
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#searchbypin">Search by Pin</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#searchbydist">Search by District</a>
            </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container active" id="searchbypin">
                <form>
                    <div class="form-group">
                        <label for="pin">Enter Your Pin:</label>
                        <input type="text" class="form-control" placeholder="Enter your pin" id="pin" name="pin">
                    </div>
                    <button type="button" class="btn btn-primary" id="search-by-pin-btn" onclick="getByPin();">Search</button>
                </form>

                <div class="slot-data" id="slot-data-pin">
                </div>

            </div>
            <div class="tab-pane container fade" id="searchbydist">
                <form>
                    <div class="form-group" id="state">
                        <label for="state">Select State</label>
                        <select class="form-control" name="state" id="state-list" onchange="getDist(this.value);">
                            <option value="" selected>Select State</option>
                            <?php foreach($states as $state): ?>
                            <option value='<?php echo $state['state_id']?>'><?php echo $state['state_name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group" id="dist">
                        <label for="dist">Select District</label>
                        <select class="form-control" name="dist" id="dist-list" disabled>
                            <option value="" selected>Select District</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" id="search-by-dist-btn" onclick="getByDist();">Search</button>
                </form>

                <div class="slot-data" id="slot-data-dist">
                
                    
                </div>
            </div>
        </div>
        </div>
    </section>

<script type="text/javascript">
function getDist(data){
    const distList = document.getElementById('dist-list');
    distList.innerHTML = "<option>Please Wait</option>";
    const ajaxreq = new XMLHttpRequest();
    ajaxreq.open('GET', 'process.php?state_id='+data, 'TRUE');
    ajaxreq.send();
    ajaxreq.onreadystatechange = function(){
        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
            var distList = document.getElementById('dist-list');
            distList.innerHTML = ajaxreq.responseText;
            distList.disabled = false;
        }
    }
}

function getByPin(){
    const ajaxreq = new XMLHttpRequest();
    const btn = document.getElementById('search-by-pin-btn');
    const pin = document.getElementById('pin').value;
    var table_data = document.getElementById('slot-data-pin');
    ajaxreq.open('GET', 'process.php?pin='+pin, 'TRUE');
    btn.disabled = true;
    btn.innerText = "Please Wait";
    ajaxreq.send();
    ajaxreq.onreadystatechange = function(){  
        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
            table_data.innerHTML = ajaxreq.responseText;
            table_data.scrollIntoView();
        }
    btn.disabled = false;
    btn.innerText = "Search";
        
    }
}

function getByDist(){
    const ajaxreq = new XMLHttpRequest();
    const btn = document.getElementById('search-by-dist-btn');
    var distList = document.getElementById('dist-list');
    const distID = distList.options[distList.selectedIndex].value;
    console.log(distID);
    var table_data = document.getElementById('slot-data-dist');
    ajaxreq.open('GET', 'process.php?dist='+distID, 'TRUE');
    btn.disabled = true;
    btn.innerText = "Please Wait";
    ajaxreq.send();
    ajaxreq.onreadystatechange = function(){
        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
            console.log(ajaxreq.responseText);
            table_data.innerHTML = ajaxreq.responseText;
            table_data.scrollIntoView();
        }
        btn.disabled = false;
        btn.innerText = "Search";
    }
}
</script>
<?php include("include/footer.php"); ?>
</body>
</html>


