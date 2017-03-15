<!DOCTYPE HTML>
<html>

<head>
    <title>Homework Assignment 6</title>
    <meta content="text/html"; charset="utf-8" http-equiv="content-type">
    <meta content="utf-8" http-equiv="encoding">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-family: ariel;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }

        .block {
            top: 0;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: left;
            width: 70%;
            display: block;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
            background-color: lightgrey;

        }
        .headline {
            top: 0;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
        }
        #result{
            top: 0;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: left;
            display: block;
            width: 80%;
        }
        table {
            /*border: 1px solid;*/
            width: 100%;
            border-collapse: collapse;

        }
        th,td {

            border: 1px solid black;
            border-collapse: collapse;
        }
        th {
             background-color: darkgrey;
        }
        td {
            background-color: lightgrey;
        }
    </style>
    <script type="text/javascript">

        function setResult(){
            document.getElementById("result").style.display = 'block';
            return;
        }
        function setPlaces(){
            selectOption = document.getElementsByName("stype")[0].value;
            if(selectOption == "Place") {
                document.getElementById("location").style.display = 'inline';
                document.getElementById("distance").style.display = 'inline';
                document.getElementById("p_location").style.display = 'inline';
                document.getElementById("p_distance").style.display = 'inline';
            }
            else
            {
                document.getElementById("location").style.display = 'none';
                document.getElementById("distance").style.display = 'none';
                document.getElementById("p_location").style.display = 'none';
                document.getElementById("p_distance").style.display = 'none';
                document.getElementById("location").value = "";
                document.getElementById("distance").value = "";
            }
            return;
        }
        function resetButton() {

            $keyword = document.getElementsByName("name");
            $type = document.getElementsByName("stype");

            document.getElementById("keyword").value = "";
            document.getElementsByName("stype")[0].value = "User";
            document.getElementById("result").style.display = 'none';
            document.getElementById("location").style.display = 'none';
            document.getElementById("distance").style.display = 'none';
            document.getElementById("p_location").style.display = 'none';
            document.getElementById("p_distance").style.display = 'none';
            document.getElementById("location").value = "";
            document.getElementById("distance").value = "";
        }
        function checkDetails(id)
        {
            //document.getElementById("formValue").value = "anchorSubmit";

            document.getElementById("formValue").value = id;
            alert("i am here " + document.getElementById("formValue").value + "ID:" + id);
            //formSubmit();       //Manual because .submit() won't trigger form submit event!
            document.getElementById("submitForm").submit();
        }
        function formSubmit() {
            alert("Submitted");
            document.getElementById("formValue").value = "formSubmit";
            return true;
        }

        function profile(img) {
            var text = '<!DOCTYPE html><html><body><div><img src =' + img.src + ' Stretch="None"></div></body></html>';
            //alert('uri is ' + photoUrl + "text is : " + text);
            var newWind = window.open("");
            newWind.document.write(text);
            newWind.document.close();
        }

        function postClick() {
            if (document.getElementById("post").style.display == 'none')
            {
                if (document.getElementById("album").style.display == 'inline')
                {
                    document.getElementById("album").style.display = 'none';
                }
                document.getElementById("post").style.display = 'inline';
            }
            else
            {
                document.getElementById("post").style.display = 'none';
            }
        }

        function albumClick() {
            if (document.getElementById("album").style.display == 'none')
            {
                if (document.getElementById("post").style.display == 'inline')
                {
                    document.getElementById("post").style.display = 'none';
                }
                document.getElementById("album").style.display = 'inline';
            }
            else
            {
                document.getElementById("album").style.display = 'none';
            }
        }

        function getHDImage(photoUrl) {
            //TODO: Make it on left not centre

            var text = '<!DOCTYPE html><html><body><div><img src =' + photoUrl + ' Stretch="None"></div></body></html>';
            //alert('uri is ' + photoUrl + "text is : " + text);
            var newWind = window.open("");
            newWind.document.write(text);
            newWind.document.close();

            /*var img = '<!DOCTYPE html><html><head><title>image</title></head><body><p><img src =' + photoUrl + ' Stretch="None"></p></body></html>';
            myWindow = window.open("");
            myWindow.document.write(img);
            myWindow.document.close();*/
        }

    </script>
</head>

<body>

<script>

</script>
<?php
$name = "";
$stype = "User";
$loc = "";
$dis = "";
$lat = "";
$long = "";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["formValue"])) {
    $name = test_input($_POST["name"]);
    $stype = test_input($_POST["stype"]);
    $loc = test_input($_POST["location"]);
    $dis = test_input($_POST["distance"]);
}
?>

<fieldset class="block">
    <div class="headline"><i>Facebook search</i></div>
    <hr>
    <form method="post" action="" id="submitForm" onsubmit="return formSubmit()">
        Keyword:
        <input id="keyword" type="text" name="name" value="<?php echo isset($_POST['name'])?  $name : "";?>"  required>
        <br>
        Type:
        <select name="stype" style="margin-left: 27px; margin-top: 5px" onchange="setPlaces()">
            <option value="User" <?php if ( isset($_POST['stype']) && $stype=="User" ) echo "selected=selected";?>>User</option>}
            <option value="Page" <?php if ( isset($_POST['stype']) && $stype=="Page" ) echo "selected=selected";?>>Pages</option>
            <option value="Event" <?php if ( isset($_POST['stype']) && $stype=="Event" ) echo "selected=selected";?>>Events</option>
            <option value="Group" <?php if ( isset($_POST['stype']) && $stype=="Group" ) echo "selected=selected";?>>Groups</option>
            <option value="Place" <?php if ( isset($_POST['stype']) && $stype=="Place" ) echo "selected=selected";?>>Places</option>
        </select>
        <br>
        <p id="p_location">Location:</p>
        <input id="location" type="text" name="location" value="<?php echo isset($_POST['location'])?  $loc : "";?>">
        <p id="p_distance">Distance(meters):</p>
        <input id="distance" type="text" name="distance" value="<?php echo isset($_POST['distance'])?  $dis : "";?>">
        <br>
        <br>
        <input name="formValue" id="formValue" type="text" value="submit" hidden>
        <input type="submit" style="margin-left: 67px;" value="Submit" name="submit_button"/>
        <input type="button" value="Reset" onclick=resetButton() />
    </form>
</fieldset>

<?php
date_default_timezone_set("America/Los_Angeles");
require_once __DIR__ . '/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '509778816077645',
    'app_secret' => 'd4c30bf9fb90d0e270537ea15a166c9a',
    'default_graph_version' => 'v2.5'
]);


$fb->setDefaultAccessToken('EAAHPpCEZCD00BABeWSZAPPhNAjg1ZCnUlIj1UKd3dZAZCYZCqaivdb9NvhwiOZCI9mUa6nUe57UxUpH5YDGIt2Dhq5Pziop6QdlWneW3hh8aXk9lZCB9MTFnZB2AAugnZA9iuc0LatynUiz1RYeLZBKdlLZC');

try{
    $user = $fb->get('/me');
    $user = $user->getGraphNode()->asArray();
}
catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph return an error: ' . $e->getMessage();
}
catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if($stype == "Place"){

    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $loc . '&key=AIzaSyATALr9OOELhJSknaV4uZ8q0qt5vNCWwKI');
    $output = json_decode($geocode);
    if($output->status == "OK"){

        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
    }
}

echo '<script> setPlaces(); </script>';
?>

<div id="result" style="display: none">

<?php

if (isset($_POST["formValue"])) {
    echo '<script> setPlaces(); </script>';
    echo '<script> setResult(); </script>';
    echo $name, $stype;


try {
    //$response = $fb->sendRequest('GET', '/search', array('q' => $_POST['name'], 'type' => $_POST['stype'], 'field' => 'id,name,picture.width(700).height(700)'));
    if($_POST['formValue'] == "formSubmit") {
        try {
            if($stype == "Event"){
                $response = $fb->get('/search?q=' . $name . '&type=' . $stype . '&fields=id,name,picture.width(700).height(700),place');
            }
            else if($stype == "Place")
            {
                if($lat && $long && $dis) {
                    $response = $fb->get('/search?q=' . $name . '&type=' . $stype . '&center=' . $lat . ',' . $long . '$distance' . $dis . '&fields=id,name,picture.width(700).height(700),place');
                }
                else if($lat && $long)
                {
                    $response = $fb->get('/search?q=' . $name . '&type=' . $stype . '&center=' . $lat . ',' . $long . '&fields=id,name,picture.width(700).height(700),place');
                }
                else {
                    $response = $fb->get('/search?q=' . $name . '&type=' . $stype . '&fields=id,name,picture.width(700).height(700),place');
                }
            }
            else{
                $response = $fb->get('/search?q=' . $name . '&type=' . $stype . '&fields=id,name,picture.width(700).height(700)');
            }
        }
        catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph return an error: ' . $e->getMessage();
        }
        catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
        }
        $search = $response->getGraphEdge()->asArray();
        if (!$search) {
            echo '<p style="border: 0.1px white; background-color: lightgray; text-align: center; width: 100%;"> No Records has been found </p>';
        } else {

            echo '<table>';
            echo '<tr>';
            echo '<th style="size: 30 %">' . 'Profile Photo' . '</th>';
            echo '<th style="size: 50 %">' . 'Name' . '</th>';
            if($stype != "Event") {
                echo '<th style="size: 20 %">' . 'Details' . '</th>';
            }
            else {
                echo '<th style="size: 20 %">' . 'Place' . '</th>';
            }
            echo '</tr>';


            foreach ($search as $key) {
                echo '<tr>';
                $image = $key['picture']['url'];
                $id = $key["id"];
                $id1 = '\'' . $id . '\'';
                echo '<td>' . '<img src=' . $image . ' width="30px" height="40px" onclick="profile(this)">' . '</td>';
                echo '<td>' . $key['name'] . '</td>';
                //echo "<script> document.getElementById('formValue').value = $image; </script>";
                if($stype != "Event") {
                    echo '<td>' . '<a href="javascript:checkDetails(' . $id1 . ')" > details</a>' . '</td>';
                }
                else {
                    if(isset($key['place'])) {
                        echo '<td>' . '<p>'. $key['place']['name'] .'</p>' . '</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                }
                echo '</tr>';
            }
            echo '</table>';
        }
    }
    else {
        try {
            $response = $fb->get('/' . $_POST['formValue'] . '? fields=id,name,picture.width(700).height(700),albums.limit(5){name,photos.limit(2){nam
e, picture}},posts.limit(5)');
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph return an error: ' . $e->getMessage();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
        }
        $search = $response->getGraphNode()->asArray();
        $isAlbum = 0;
        $isPost = 0;
        if (array_key_exists('albums', $search)) {
            $isAlbum = 1;
        }
        if (array_key_exists('posts', $search)) {
            $isPost = 1;
        }

        if (!$isAlbum) {
            echo '<p style="border: 0.1px white; background-color: lightgray; text-align: center; width: 100%;"> No Albums has been found </p>';
        } else {
            echo '<input type="button" onclick="albumClick()" value="Albums" style="width: 100%">';
            echo '<div id="album" style="display: none; ">';
            echo '<table>';
            //foreach ($search as $key) {
            $albumData = $search['albums'];
            foreach ($albumData as $data) {

                echo '<tr colspan="2"><td>' . $data['name'] . '</td></tr>';
                $albumPhoto = $data['photos'];
                echo '<tr><td>';
                foreach ($albumPhoto as $photo) {
                    try {
                        $urlResponse = $fb->get('/' . $photo['id'] . '/picture?redirect=false');
                    } catch (Facebook\Exceptions\FacebookResponseException $e) {
                        echo 'Graph return an error: ' . $e->getMessage();
                    } catch (Facebook\Exceptions\FacebookSDKException $e) {
                        echo 'Facebook SDK returned an error: ' . $e->getMessage();
                    }
                    $urlResult = $urlResponse->getGraphNode()->asArray();
                    var_dump($urlResult);
                    if(isset($urlResult['url'])) {
                        $urlResult1 = '\'' . $urlResult['url'] . '\'';
                    }
                    else{
                        $urlResult1 = '\'' . $photo['picture'] .'\'';
                    }
                    echo '<img src=' . $photo['picture'] . ' width="30px" height="40px" onclick="getHDImage('. $urlResult1.')">';
                    echo " ";
                }
                echo '</td></tr>';

            }
            echo '</table>';
            echo '</div>';
        }
        echo '<br>';
        echo '<br>';

        if (!$isPost) {
            echo '<p style="border: 0.1px white; background-color: lightgray; text-align: center; width: 100%;"> No Posts has been found </p>';
        } else {
            echo '<input type="button" onclick="postClick()" value="Posts" style="width: 100%;">';
            echo '<div id="post" style="display: none; ">';
            echo '<table>';
            $albumData = $search['posts'];
            foreach ($albumData as $data) {
                if(isset($data['message'])) {
                    echo '<tr><td>' . $data['message'] . '</td></tr>';
                }
            }
            echo '</table>';
            echo '</div>';
        }
    }
}
catch (Facebook\Exceptions\FacebookAuthenticationException $e) {
        echo 'Request returns an error: ' . $e->getMessage();
    }
}
?>
</div>

</body>

</html>