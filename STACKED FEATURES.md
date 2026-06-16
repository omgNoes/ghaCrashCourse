# Stacked features

Dit is een experiment! :)

Er gaan twee afhankelijke features komen, met elk één PR. 
Feature A wordt eerst aangeboden in een PR, gevolgd door feature B. 
Feature B zal een branch krijgen vanaf de tip van feature A, want feature B is functioneel afhankelijk van A.
Terwijl gewacht wordt op afronding en mergen van feature A zal werk aan feature B moeten beginnen. Mogelijk zelfs een feature C die ook afhankelijk is van feature A.

De vraag is wat Github doet met een PR voor feature B, wanneer de feature A PR (uit)eindelijk gemerged wordt?
De feature A branch verdwijnt namelijk wanneer de commits gesquashed worden en toegevoegd aan main. Hierdoor is de "root" van branch(es) voor feature B (en mogelijk meer) niet meer als branch A te bereiken.
Een approval op een PR voor feature B zou enkel die commits moeten squashen en kopiëren naar main, vanaf de PR branch B tip tot de commit waarop de feat B PR getarget werd - deze commit was ooit de tip van de feature A tot deze gemerged werd en het branchlabel werd opgeruimd.

Het zou fijn zijn als de GitHub PR "approval & merge" UI duidelijk aangeeft wat de situatie is, en wat er gaat gebeuren wanneer voor de PR een "Squash & Rebase merge" wordt gevraagd!

RR.
