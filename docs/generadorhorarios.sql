CREATE TABLE subjects (
    id INT(3) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    semester INT NOT NULL,
    hours_week INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE  `groups` (
    id INT(3) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    semester INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE teachers (
    id INT(4) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE classrooms (
    id INT(4) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE availability (
    id INT(2) unsigned NOT NULL AUTO_INCREMENT,
    teacher_id INT(4) unsigned NOT NULL,
    morning_mo VARCHAR(10),
    morning_tu VARCHAR(10),
    morning_we VARCHAR(10),
    morning_th VARCHAR(10),
    morning_fr VARCHAR(10),
    evening_mo VARCHAR(10),
    evening_tu VARCHAR(10),
    evening_we VARCHAR(10),
    evening_th VARCHAR(10),
    evening_fr VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(teacher_id) REFERENCES teachers(id) ON DELETE CASCADE
);

CREATE TABLE assigned_classes (
    id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    subject_id INT(3) UNSIGNED NOT NULL,
    group_id INT(3) UNSIGNED NOT NULL,
    teacher_id INT(4) UNSIGNED NOT NULL,
    assignment_priority ENUM('alta', 'baja') NOT NULL DEFAULT 'baja',
    cycle VARCHAR(6) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE (subject_id, group_id, cycle),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(subject_id) REFERENCES subjects(id),
    FOREIGN KEY(group_id) REFERENCES `groups`(id),
    FOREIGN KEY(teacher_id) REFERENCES teachers(id)
);