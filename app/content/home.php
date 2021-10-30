<div class="jumbotron">
    <div class="container"><h1>Welcome to Fritzed!</h1>
        <p>A Really Vulnerable Web Application</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Please hack me!</h2>
        <p>Fritzed was made to be hacked. It contains many common web application flaws.
           There are no lessons, exercises, or right or wrong answers. It exists for you
           to learn by discovering the flaws in any order and at your own pace.</p>
        <?php if($config['site']['show_extended_homepage']) { ?>
            <h2>How insecure is Fritzed?</h2>
            <p>Fritzed is really insecure. The following vulnerability classes and attack vectors exist in this application:</p>
            <ul>
                <li><a href="https://www.owasp.org/index.php/SQL_Injection" target="_blank">SQL Injection</a></li>
                <li><a href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)" target="_blank">XSS (Corss-Site-Scripting)</a></li>
                <li><a href="https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF)" target="_blank">CSRF (Cross-Site-Request-Forgery)</a></li>
                <li><a href="https://www.owasp.org/index.php/Session_hijacking_attack" target="_blank">Session Hijacking</a></li>
                <li><a href="https://www.owasp.org/index.php/Session_fixation" target="_blank">Session Fixation</a></li>
                <li><a href="https://www.owasp.org/index.php/Content_Spoofing" target="_blank">Content Spoofing</a></li>
                <li><a href="https://www.owasp.org/index.php/Top_10_2013-A7-Missing_Function_Level_Access_Control" target="_blank">Missing Function Level Access Control</a></li>
                <li><a href="https://www.owasp.org/index.php/Path_Traversal" target="_blank">Path Traversal</a></li>
                <li><a href="https://www.owasp.org/index.php/Top_10_2013-A6-Sensitive_Data_Exposure" target="_blank">Sensitive Data Exposure</a></li>
                <li><a href="https://www.owasp.org/index.php/Brute_force_attack" target="_blank">Brute Force Attacks</a></li>
            </ul>
        <?php } ?>
    </div>
</div>