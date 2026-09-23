CREATE TABLE user_sessions(
    -- Session Id to be used in dashboards and reference--
    session_id INT AUTO_INCREMENT PRIMARY KEY,

    -- User Id reference 
    user_Id INT NOT NULL,

    -- Session Attributes
    session_start DATETIME NOT NULL DEFAULT_CURRENT TIME,
    sesion_end DATETIME DEFAULT NULL,
    session_duration INT DEFAULT NULL,

    --Constraints and Foreign Ky Implementation
    CONSTRAINT fk_user_sessios_user_id
        FOREIGN KEY (user_id)
        REFERENCES user(user_id)
        ON DELETE CASCADE 
        ON UPDATE 
);