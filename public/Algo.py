import re

#Fungsi untuk membuat border table pada algoritma KMP dengan masukan pattern yang akan dicari
def computeFail(pattern):
	#Inisiasi tabel dan iterator
	len_fail = len(pattern) - 1
	fail = [0 for i in range(len_fail)]
	j = 0
	i = 1

	#mengisi value tabel
	while (i < len_fail):
		if(pattern[j] == pattern[i]):
			fail[i] = j + 1
			i=i+1
			j=j+1
		elif (j > 0):
			j = fail[j-1]
		else:
			fail[i] = 0
			i=i+1

	return fail


#Fungsi Pencocokan Pattern pendekatan KMP dengan masukan pattern yang akan dicari (dalam bentuk string) dan suatu teks tempat pattern akan dicari, mengembalikan True atau False
def matchKMP(text, pattern):
	#Inisiasi
	len_text = len(text)
	len_pattern = len(pattern)

	fail = computeFail(pattern)

	i = 0
	j = 0
	found = False

	#Algoritma KMP
	while (i<len_text and not found):
		if(pattern[j] == text [i]):
			if (j == len_pattern-1):
				found = True
			else:
				i = i + 1
				j = j + 1
		elif (j>0):
			j = fail[j-1]
		else:
			i = i+1

	return found

#Fungsi yang mengembalikan tabel yang berisi kemunculan terakhir seluruh karakter ascii di dalam suatu pattern
def buildLast(pattern):
	last = [-1 for i in range(128)]
	for i in range(len(pattern)):
		asc = ord(pattern[i]) - 97
		last[asc] = i

	return last

#Fungsi Pencocokan Pattern pendekatan Bayern-Moore dengan masukan pattern yang akan dicari (dalam bentuk string) dan suatu teks tempat pattern akan dicari, mengembalikan True atau False
def matchBM(text,pattern):
	last = buildLast(pattern)
	len_text = len(text)
	len_pattern = len(pattern)
	i = len_pattern-1


	if (i>len_text-1):
		return False
	
	j = i
	found = False


	if (pattern[j] == text[i]):
		if (j == 0):
			found = True
		else:
			i=i-1
			j=j-1
	else:
		last_occur = last[ord(pattern[i])-97]
		i = i + len_pattern - min(j,1+last_occur)
		j = len_pattern - 1

	while (i<= len_text-1 and not found):
		if (i>len_text-1):
			return False
	
		if (pattern[j] == text[i]):
			if (j == 0):
				found = True
			else:
				i=i-1
				j=j-1
		else:
			last_occur = last[ord(text[i])-97]
			i = i + len_pattern - min(j,1+last_occur)
			j = len_pattern - 1

	return found

#Fungsi Pencocokan Pattern pendekaran regex dengan masukan pattern yang dicari (dalam bentuk ekspresi Regex) dan suatu teks tempat pattern akan dicari. Mengembalikan True atau False
def matchRE(text,pattern):
	found = re.search(pattern, text)
	
	if found:
		return True
	else:
		return False

#Contoh Penggunaan [DELETE THIS LATER]
# tes = matchKMP("Bangsat kamu manusia yang tidak tahu diri", "Bangsatt")
# print(tes)

# tes2 = matchBM("Bangsat kamu manusia yang tidak tahu diri", "nas")
# print(tes2)

# tes3 = matchRE("Bangsat kamu manusia yang tidak tahu diri", "Bangsa")
# print(tes3)
