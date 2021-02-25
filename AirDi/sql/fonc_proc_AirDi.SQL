DROP PROCEDURE IF EXISTS prcNBVols;

DELIMITER |

CREATE PROCEDURE prcNBVols(
	IN nomPilote VARCHAR(20),
	OUT nbVols INT)
BEGIN
     SELECT COUNT(*) INTO nbVols
     FROM vol
	      INNER JOIN pilote ON pilote.pil = vol.pil
     WHERE pilote.pilNom = nomPilote;
END |

DELIMITER ;

DROP FUNCTION IF EXISTS fctNbVols;

DELIMITER |

CREATE FUNCTION fctNbVols(nomPilote VARCHAR(20))
	RETURNS INT
BEGIN
	DECLARE nb INT;

    SELECT COUNT(*) INTO nb
      FROM vol 
	       INNER JOIN pilote ON pilote.pil = vol.pil
     WHERE pilote.pilNom = nomPilote;
      
    RETURN nb;
END |

DELIMITER ;

-- ESSAIS
SET @nom = 'Bertrand';
SET @nbVols = 0;

CALL prcNBVols(@nom,@nbVols);
SELECT @nbVols AS `nombre de vols`;

SELECT fctNbVols(@nom) AS `nombre de vols`;