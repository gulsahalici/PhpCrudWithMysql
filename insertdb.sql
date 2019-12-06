use envestdb;

INSERT INTO panels(panelId, panelName, profitMargin ) VALUES(1, 'CP100', 20);
INSERT INTO panels(panelId, panelName, profitMargin ) VALUES(2, 'CP140', 15);
INSERT INTO panels(panelId, panelName, profitMargin ) VALUES(3, 'CP200', 35);
INSERT INTO panels(panelId, panelName, profitMargin ) VALUES(4, 'P10', 10);
INSERT INTO panels(panelId, panelName, profitMargin ) VALUES(5, 'C0', 25);

INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(1, 'PVC Board Frame', 20, 244, 'TRY');
INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(2, 'AC UPS', 25, 30, 'USD');
INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(3, 'DC UPS', 15, 110, 'EUR');
INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(4, '5A SMPS', 30, 91, 'TRY');
INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(5, '2.5A SMPS', 10, 57, 'TRY');
INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(6, '396R PLC', 75, 175, 'USD');
INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(7, '42A Analog Module', 20, 130, 'USD');
INSERT INTO components(componentId, componentName, stock, price, currency ) VALUES(8, 'Modem', 10, 140, 'USD');

INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(1, 1, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(1, 2, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(1, 6, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(1, 5, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(1, 8, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(2, 1, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(2, 3, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(2, 4, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(2, 6, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(2, 7, 2);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(2, 8, 1);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(3, 2, 2);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(3, 3, 2);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(4, 1, 5);
INSERT INTO panelcontent(panel_id, component_id, component_number ) VALUES(4, 8, 3);