# Forma de trabajo
Sugiro que una vez que ya cloanaron el repositorio y son colaboradores cada quien trabaje en un branch, aunque no habrá problema alguno ya que todos vamos a trabajar en archivos distintos, de igual forma si tienen alguna duda sobre como trabajar de esa forma pueden ver el siguiente video https://www.youtube.com/watch?v=jhtbhSpV5YA&ab_channel=AkoDev

### Los pasos para trabajar de esa forma son:
1. git checkout -b nombreRama
2. Trabjas y modificas lo que quieras
3. git add .
4. git commit -m "Se agrego a mi rama"
5. git push -u origin nombreRama
6. git pull -u origin main
7. Hacer el Pull requests
8. Se aceptará de inmediato si no corregir los confictos
9. git checkout main (En este punto no verás nada de lo que hiciste en tu rama)
10. git pull (Ahora si)

Se recomienda borrar el branch cuando este ya fue ulitizado pero no lo veo necesario, pero para hacerlo:
* git branch -D nombreRama
