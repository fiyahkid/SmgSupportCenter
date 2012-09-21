
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ticket_verlauf
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ticket_verlauf`;

CREATE TABLE `ticket_verlauf`
(
    `id_ticket_verlauf` INTEGER NOT NULL AUTO_INCREMENT,
    `tv_fehlermeldung` VARCHAR(200) NOT NULL,
    `tv_fehlertext` LONGTEXT NOT NULL,
    `tv_screenshot` VARCHAR(200),
    `tv_bearbeiter` VARCHAR(10) NOT NULL,
    `tv_datum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `tv_status` VARCHAR(15) NOT NULL,
    `ticket_id` INTEGER NOT NULL,
    PRIMARY KEY (`id_ticket_verlauf`),
    INDEX `ticket_id` (`ticket_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ticketsystem
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ticketsystem`;

CREATE TABLE `ticketsystem`
(
    `id_ticketsystem` INTEGER NOT NULL AUTO_INCREMENT,
    `ticket_id` INTEGER(10) NOT NULL,
    `an` CHAR(50) NOT NULL,
    `debitor` VARCHAR(20) NOT NULL,
    `datum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `fehlermeldung` CHAR(200) NOT NULL,
    `von` CHAR(50) NOT NULL,
    `produkt` CHAR(100) NOT NULL,
    `fehlerart` CHAR(100) NOT NULL,
    `fehlertext` LONGTEXT NOT NULL,
    `screenshot` VARCHAR(200),
    `status` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_ticketsystem`),
    INDEX `ticket_id` (`ticket_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
