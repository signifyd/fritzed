<?php

class Installation_Model {

    private $tables = array(
        'users' => array(
            'fields' => array(
                array(
                    'sqlite' => 'id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT',
                    'mysql' => 'id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT',
                ),
                'username VARCHAR(50)  NOT NULL',
                'password VARCHAR(50)  NOT NULL',
                'email VARCHAR(255)  NOT NULL',
                'country VARCHAR(255)  NOT NULL',
                'is_admin INTEGER(1) DEFAULT 0 NOT NULL'
            ),
            'entries' => array(
                '(id, username, password, email, country, is_admin) VALUES (1, \'admin\', \'84d961568a65073a3bcf0eb216b2a576\', \'admin@example.com\', \'Freedonia\', 1)',
                '(id, username, password, email, country, is_admin) VALUES (2, \'user\', \'37b4e2d82900d5e94b8da524fbeb33c0\', \'user@example.com\', \'Freedonia\', 0)',
            )
        ),
        'downloads' => array(
            'fields' => array(
                array(
                    'sqlite' => 'id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT',
                    'mysql' => 'id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT',
                ),
                'allow_guests INTEGER(1) DEFAULT 1 NOT NULL',
                'approved INTEGER(1) DEFAULT 0 NOT NULL',
                'title VARCHAR(255)  NOT NULL',
                'description TEXT  NOT NULL',
                'file VARCHAR(255)  NOT NULL'
            ),
            'entries' => array(
                '(id, allow_guests, approved, title, description, file) VALUES (1, 1, 1, \'Dummy text file (1.000 Words)\', \'This is a file with 1,000 dummy words (Lorem Ipsum) that is used as example content for websites.\', \'lorem-ipsum-1000-words.txt\')',
                '(id, allow_guests, approved, title, description, file) VALUES (2, 1, 1, \'Dummy text file (10.000 Words)\', \'This is a file with 10,000 dummy words (Lorem Ipsum) that is used as example content for websites.\', \'lorem-ipsum-10000-words.txt\')'
            )
        ),
        'threads' => array(
            'fields' => array(
                array(
                    'sqlite' => 'id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT',
                    'mysql' => 'id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT',
                ),
                'title VARCHAR(255)  NOT NULL',
                'admins_only INTEGER(1) DEFAULT 0 NOT NULL'
            ),
            'entries' => array(
                '(id, title, admins_only) VALUES (1, \'Welcome to the Fritzed forum!\', 0)',
                '(id, title, admins_only) VALUES (2, \'For admins only...\', 1)',
                '(id, title, admins_only) VALUES (3, \'Post your favorite vulnerability\', 0)'
            )
        ),
        'posts' => array(
            'fields' => array(
                array(
                    'sqlite' => 'id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT',
                    'mysql' => 'id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT',
                ),
                'thread_id INTEGER  NOT NULL',
                'user_id INTEGER  NOT NULL',
                'timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL',
                'text TEXT  NOT NULL'
            ),
            'entries' => array(
                "(id, thread_id, user_id, timestamp, text) VALUES (13256, 1, 1, '2021-10-29 03:13:37', 'Welcome to the Fritzed forum! I&apos;m your friendly admin. Let me know if I can help with anything!')",
                "(id, thread_id, user_id, timestamp, text) VALUES (23566, 2, 1, '2021-10-29 09:00:56', 'Superman was here.')",
                "(id, thread_id, user_id, timestamp, text) VALUES (85224, 1, 2, '2021-10-29 06:15:22', 'I was here first.')",
                "(id, thread_id, user_id, timestamp, text) VALUES (89368, 3, 2, '2021-10-29 09:15:55', 'SSRFs are the best.')"
            )
        )
    );
    private $db = null;
    private $prefix = null;
    private $driver = null;

    public function __construct($pDatabase, $pPrefix) {
        $this->db = $pDatabase;
        $this->prefix = $pPrefix;

        $this->driver = $pDatabase->getAttribute(PDO::ATTR_DRIVER_NAME);

        if(null === $this->driver) {
            error(500, 'Database driver could not be determined.');
        }
    }

    public function dropFritzedTables() {
        try {
            foreach ($this->tables as $table => $data) {
                $sql = 'DROP TABLE IF EXISTS ' . $this->prefix . $table . ';';
                $this->db->exec($sql);
            }
        }
        catch(Exception $ex) {
            error(500, 'Query (Drop Fritzed Tables) could not be executed', $ex);
        }
    }

    public function createFritzedTables() {
        try {
            foreach ($this->tables as $table => $data) {
                $fields = array();
                foreach ($data['fields'] as $field) {
                    if(is_array($field)) {
                        if(isset($field[$this->driver])) {
                            $fields[] = $field[$this->driver];
                        }
                        else {
                            error(500, 'Database driver ' .  $this->driver . 'is currently not supported.');
                        }
                    }
                    else {
                        $fields[] = $field;
                    }
                }
                $sql = 'CREATE TABLE ' . $this->prefix . $table . ' (' . implode(',', $fields) . ');';
                $this->db->exec($sql);
            }
        }
        catch(Exception $ex) {
            error(500, 'Query (Create Fritzed Tables) could not be executed', $ex);
        }
    }

    public function insertFritzedData() {
        try {
            foreach ($this->tables as $table => $data) {
                foreach ($data['entries'] as $entry) {
                    $sql = 'INSERT INTO ' . $this->prefix . $table . ' ' . $entry . ';';
                    $this->db->exec($sql);
                }
            }
        }
        catch(Exception $ex) {
            error(500, 'Query (Insert Fritzed Data) could not be executed', $ex);
        }
    }

}