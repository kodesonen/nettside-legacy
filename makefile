all:
	clear
	@rsync -a --stats --delete --exclude='.git/' ./ siratech@domeneshop:kodesonen/

gitup:
	git commit -a -m "Update"
	git push origin master
