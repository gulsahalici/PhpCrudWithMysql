  
CREATE DATABASE envestdb;
USE envestdb;

CREATE TABLE IF NOT EXISTS components(
	componentId INT NOT NULL AUTO_INCREMENT,
    componentName VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    price INT NOT NULL,
    currency VARCHAR(50) NOT NULL,
    PRIMARY KEY(componentId)
);

CREATE TABLE IF NOT EXISTS panels(
	panelId INT NOT NULL AUTO_INCREMENT,
    panelName VARCHAR(50) NOT NULL,
    profitMargin INT NOT NULL,
    PRIMARY KEY(panelId)
);

CREATE TABLE IF NOT EXISTS panelcontent(
	panel_id INT NOT NULL,
    component_id INT NOT NULL,
    component_number INT NOT NULL,
    FOREIGN KEY (panel_id) REFERENCES panels(panelId),
    FOREIGN KEY (component_id) REFERENCES components(componentId)
);
