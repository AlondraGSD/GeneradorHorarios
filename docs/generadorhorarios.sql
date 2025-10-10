CREATE TYPE priority_level AS ENUM ('alta', 'baja');

CREATE TABLE subjects (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    semester INT NOT NULL,
    hours_week INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE "groups" (
    id SERIAL PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    semester INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE teachers (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE classrooms (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE laboratories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cycles (
	id SERIAL PRIMARY KEY,
	name VARCHAR(10) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE availability (
    id SERIAL PRIMARY KEY,
    teacher_id INT NOT NULL,
    morning_mo VARCHAR(10),
    morning_tu VARCHAR(10),
    morning_we VARCHAR(10),
    morning_th VARCHAR(10),
    morning_fr VARCHAR(10),
	morning_sa VARCHAR(10),
	morning_su VARCHAR(10),
    evening_mo VARCHAR(10),
    evening_tu VARCHAR(10),
    evening_we VARCHAR(10),
    evening_th VARCHAR(10),
    evening_fr VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE
);

CREATE TABLE assigned_classes (
    id SERIAL PRIMARY KEY,
    subject_id INT NOT NULL,
    group_id INT NOT NULL,
    teacher_id INT NOT NULL,
	cycle_id INT NOT NULL,
    assignment_priority priority_level NOT NULL DEFAULT 'baja',
    UNIQUE (subject_id, group_id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(subject_id) REFERENCES subjects(id),
    FOREIGN KEY(group_id) REFERENCES "groups"(id),
    FOREIGN KEY(teacher_id) REFERENCES teachers(id),
	FOREIGN KEY(cycle_id) REFERENCES cycles(id)
);

CREATE TABLE assigned_labs (
    id SERIAL PRIMARY KEY,
    laboratory_id INT NOT NULL,
    subject_id INT NOT NULL,
    group_id INT NOT NULL,
    teacher_id INT NOT NULL,
    cycle_id INT NOT NULL,
    assignment_priority priority_level NOT NULL DEFAULT 'baja',
    UNIQUE (subject_id, group_id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (laboratory_id) REFERENCES laboratories(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id),
    FOREIGN KEY (group_id) REFERENCES "groups"(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    FOREIGN KEY (cycle_id) REFERENCES cycles(id)
);