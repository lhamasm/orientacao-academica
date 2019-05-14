import re
import requests

arquivo = open('pagina.txt', 'r')
linha = arquivo.readlines()

padrao = r'<tr class="[a-z]+"><td align="center">([0-9]+)</td><td><a href="(/SiacWWW/ListaDisciplinasEmentaPublico\.do\?cdCurso=[0-9]+&nuPerCursoInicial=[0-9]+)">([A-Z\s\-]+)</a></td></tr>'
resultado = re.findall(padrao, linha[0])

print resultado

for curso in resultado:
	page = requests.get("https://alunoweb.ufba.br" + curso[1])
	print page