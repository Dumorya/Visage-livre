CREATE FUNCTION visagelivre._commentaire(idParam integer)
RETURNS TABLE(ref integer, id integer) AS
$$
BEGIN
	RETURN QUERY 
 WITH RECURSIVE heritage AS(
		SELECT c.iddoc,c.ref FROM visagelivre._comment c 
    	INNER JOIN visagelivre._document d ON c.iddoc = d.iddoc WHERE c.ref = 38
UNION ALL 
    	SELECT c.iddoc,c.ref FROM visagelivre._comment c 
    	INNER JOIN heritage h ON c.ref = h.iddoc
)
    	SELECT * FROM heritage;

END;
$$ LANGUAGE plpgsql;