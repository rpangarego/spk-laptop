CREATE TABLE tb_harga(
	id_harga INT(3) NOT NULL,
	minHarga INT(10) NOT NULL,
	maxHarga INT(10) NOT NULL,
	value FLOAT NOT NULL,
	PRIMARY KEY(id)
	)

INSERT INTO tbHarga VALUES
	(1, 0, 5000000, 0.25),
	(2, 5000001, 10000000, 0.75 ),
	(3, 10000001, )



CREATE TABLE tb_processor(
	id_processor INT(3) NOT NULL AUTO INCREMENT,
	processor VARCHAR(10) NOT NULL,
	detailProcessor VARCHAR(20) NOT NULL,
	value FLOAT NOT NULL,
	PRIMARY KEY(id_processor)
	);

-- INSERT INTO tb_processor VALUES
-- 	(1, 'Intel', 'Intel Core i3', 0.20);


CREATE TABLE tb_ram(
	id_ram INT(3) NOT NULL AUTO_INCREMENT,
	ram VARCHAR(10) NOT NULL,
	value FLOAT NOT NULL,
	PRIMARY KEY(id_ram)
	);

CREATE TABLE tb_storage(
	id_storage INT(3) NOT NULL AUTO_INCREMENT,
	storage VARCHAR(10) NOT NULL,
	value FLOAT NOT NULL,
	PRIMARY KEY(id_storage)
	);

CREATE TABLE tb_tipeStorage(
	id_tipeStorage INT(3) NOT NULL AUTO_INCREMENT,
	tipe_storage VARCHAR(10) NOT NULL,
	value FLOAT NOT NULL,
	PRIMARY KEY(id_tipeStorage)
	);

CREATE TABLE tb_layar(
	id_layar INT(3) NOT NULL AUTO_INCREMENT,
	layar VARCHAR(10) NOT NULL,
	value FLOAT NOT NULL,
	PRIMARY KEY(id_layar)
	);


CREATE TABLE tb_produk(
	id_produk INT(3) NOT NULL AUTO_INCREMENT,
	brand VARCHAR(20) NOT NULL,
	tipe_brand VARCHAR(20) NOT NULL,
	harga INT(10) NOT NULL,
	id_processor INT(3) NOT NULL,
	id_memori INT(3) NOT NULL,
	id_penyimpanan INT(3) NOT NULL,
	id_tipePenyimpanan INT(3) NOT NULL,
	id_layar INT(3) NOT NULL,
	foto_produk VARCHAR(50) NULL,
	PRIMARY KEY(id_produk)
	);


-- INSERT INTO `tb_produk`(`id_produk`, `brand`, `tipe_brand`, `harga`, `id_processor`,
--  			`id_memori`, `id_penyimpanan`, `id_tipePenyimpanan`, `id_layar`, `foto_produk`) 
-- VALUES (1,'Asus','X550',980999000,2,
-- 		1,3,1,3,NULL)


SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, tb_processor.detailProcessor, tb_memori.memori,
		tb_penyimpanan.penyimpanan, tb_tipePenyimpanan.tipePenyimpanan, tb_layar.layar, produk.foto_produk
FROM tb_produk produk JOIN tb_processor USING(id_processor)
JOIN tb_memori USING(id_memori)
JOIN tb_penyimpanan USING(id_penyimpanan)
JOIN tb_tipepenyimpanan USING(id_tipePenyimpanan)
JOIN tb_layar USING(id_layar)


SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, tb_processor.detailProcessor, 
		produk.id_memori, tb_memori.memori, produk.id_penyimpanan, tb_penyimpanan.penyimpanan, 
		produk.id_tipePenyimpanan ,tb_tipePenyimpanan.tipePenyimpanan, produk.id_layar, tb_layar.layar, produk.foto_produk
FROM tb_produk produk JOIN tb_processor USING(id_processor)
JOIN tb_memori USING(id_memori)
JOIN tb_penyimpanan USING(id_penyimpanan)
JOIN tb_tipepenyimpanan USING(id_tipePenyimpanan)
JOIN tb_layar USING(id_layar)




===================================


SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, 
	   produk.id_processor, processor.detailProcessor, processor.value,
	   produk.id_memori, ram.memori, produk.tipe_memori, ram.value,
	   produk.id_penyimpanan, spenyimpanan.penyimpanan, spenyimpanan.value, 
	   produk.id_jenispenyimpanan, jpenyimpanan.jenispenyimpanan, jpenyimpanan.value,
	   produk.id_kartugrafis, kgrafis.kartugrafis, kgrafis.vram, kgrafis.value, produk.seri_kartugrafis,
	   produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat, produk.dimensi, produk.baterai, produk.foto_produk
FROM tb_produk_baru produk JOIN tb_processor processor USING (id_processor)
						   JOIN tb_memori ram USING (id_memori)
						   JOIN tb_penyimpanan spenyimpanan USING (id_penyimpanan)
						   JOIN tb_jenispenyimpanan jpenyimpanan USING (id_jenispenyimpanan)
						   JOIN tb_kartugrafis kgrafis USING (id_kartugrafis)
ORDER BY id_produk ASC