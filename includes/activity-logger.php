<?php
<<<<<<< HEAD

function logActivity($pdo, $user_id, $user_email, $action, $status = 'success')
{
    try {
        // Get Client IP Address
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']
            ?? $_SERVER['REMOTE_ADDR']
            ?? 'Unknown';

        // If multiple IPs are provided, get the first one
        if (strpos($ip, ',') !== false) {
            $ip = trim(explode(',', $ip)[0]);
        }

        // Get User Agent
        $user_agent = substr(
            $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
            0,
            255
        );

        // Insert activity log
        $stmt = $pdo->prepare("
            INSERT INTO activity_logs (
                user_id,
                user_email,
                activity_log_action,
                activity_log_status,
                activity_log_ip_address,
                activity_log_user_agent
            ) VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $user_id,
            $user_email,
            $action,
            $status,
            $ip,
            $user_agent
        ]);

        return true;

    } catch (PDOException $e) {
        error_log("Activity Log Error: " . $e->getMessage());
        return false;
    }
}
=======
    function logActivity($pdo,$user_id,$user_email,$action, $status='success'){
        try{
            // Get Client IP Address
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

            // String to Array
            if(strpos($ip,',') !==false){
                $ip = trim(explode(',', $ip)[0]);
            }

            // Get user agent (browser)
            $user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',0,255);

            // Application Query #1
            $stmt = $pdo->prepare("
                INSERT INTO activity_logs(
                    user_id,
                    user_email,
                    activity_log_action,
                    activity_log_status,
                    activity_log_ip_address,
                    activity_log_user_agent
                ) VALUES (?,?,?,?,?,?)
            ");
 $sucess = $stmt->execute([$user_id,$user_email,$action,$status,$ip,$user_agent]);
            return $sucess;

        } catch (PDOException $e){
            error_log("Activity Log Error: ". $e->getMessage());
            return false;
        }
    }
?>
>>>>>>> 479d561edc534b8fe0720904a1e0e754f938b679
