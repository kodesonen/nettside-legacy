all:
	clear
	@rsync -a . siratech@domeneshop:kodesonen/
	@echo "Files uploaded to the FTP server!"
