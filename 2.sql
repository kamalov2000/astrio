Трим добавляется для того, чтобы всякие наглецы не понаставили в поле пробелов


SELECT
    wr.first_name, wr.last_name, car.model, GROUP_CONCAT(child.name SEPARATOR ',') as name_child
FROM
    worker AS wr
LEFT JOIN child ON wr.id = child.user_id
INNER JOIN car ON wr.id = car.user_id
WHERE
  car.model IS NULL OR TRIM(car.model) <> ''
GROUP BY wr.id;
