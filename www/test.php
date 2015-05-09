<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="text" name="search_string" placeholder="Search a contact by name"/>
    <input type="submit">
</form>
<p>Hier kann man komplexere Suche einbauen. <br>
    Beispiel unter
    <a href="http://support.sugarcrm.com/02_Documentation/04_Sugar_Developer/Sugar_Developer_Guide_6.5/02_Application_Framework/Web_Services/Examples/REST/PHP/">
        click here</a></p>

<?php
if (isset($_POST["search_string"])) {
    $url = "http://141.22.29.95/service/v4_1/rest.php";
    $username = "admin";
    $password = "steffens";

//function to make cURL request
    function call($method, $parameters, $url) {
        ob_start();
        $curl_request = curl_init();

        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        $jsonEncodedData = json_encode($parameters);

        $post = array(
            "method" => $method,
            "input_type" => "JSON",
            "response_type" => "JSON",
            "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();

        return $response;
    }

//login -----------------------------------------
    $login_parameters = array(
        "user_auth" => array(
            "user_name" => $username,
            "password" => md5($password),
            "version" => "1"
        ),
        "application_name" => "RestTest",
        "name_value_list" => array(),
    );

    $login_result = call("login", $login_parameters, $url);

    echo '<h2>Demo search_by_module (direkt per API - noch nicht über controller)</h2>';

    echo "<pre>";
//echo "<h3>Login result:</h3>";
//print_r($login_result);
    echo "</pre>";


//get session id
    $session_id = $login_result->id;
//print_r($session_id);
//search ---------------------------------------
    $search_string = $_POST["search_string"];
    $search_by_module_parameters = array(
        //Session id
        "session" => $session_id,
        //The string to search for.
        'search_string' => $search_string, // can build a regex here?
        //The list of modules to query.
        'modules' => array(
            'Contacts'
        ),
        //The record offset from which to start.
        'offset' => 0,
        //The maximum number of records to return.
        'max_results' => 20,
        //Filters records by the assigned user ID.
        //Leave this empty if no filter should be applied.
        'id' => '',
        //An array of fields to return.
        //If empty the default return fields will be from the active listviewdefs.
        'select_fields' => array(
            'first_name',
            'last_name',
            'created_buy'
        ),
        //If the search is to only search modules participating in the unified search.
        //Unified search is the SugarCRM Global Search alternative to Full-Text Search.
        'unified_search_only' => false,
        //If only records marked as favorites should be returned.
        'favorites' => false
    );

    $search_by_module_result = call('search_by_module', $search_by_module_parameters, $url);

    echo '<pre>';
    echo "<h3>Search result for $search_string:</h3>";
    print_r($search_by_module_result);
    echo '</pre>';
}
?>