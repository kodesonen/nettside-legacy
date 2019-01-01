all:
	@echo "Missing action!"

clone:
	clear
	@rsync -a --stats --delete --exclude='.git/' siratech@domeneshop:kodesonen/ ./