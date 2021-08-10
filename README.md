# Estudio de validación
Estudio para validación de CPF

Enlaces sobre validación:
- https://pt.wikipedia.org/wiki/Cadastro_de_Pessoas_F%C3%ADsicas
- https://campuscode.com.br/conteudos/o-calculo-do-digito-verificador-do-cpf-e-do-cnpj

Enlaces empresas que realizan:
- https://www.cpfcnpj.com.br/pacotes.html#cpf
- https://www.sintegraws.com.br/pagamento/pagamento.php
- https://www.loja.serpro.gov.br/consultacpf
- https://app.nfe.io/pricing

Se adjunta un archivo con una simple verificación CPF, de acuerdo con la lógica de validación de la RFB (Receita Federal do Brasil).

Para usar, simplemente agregue la URL: {HOST}.index.php?cpf=NUMERODOCPF

Ejemplo:
{HOST}.index.php?cpf=111.111.111-11

# CPF
Empecemos a trabajar con un CPF, usando como ejemplo el número: **145.382.206-20 **.

# Validando el primer dígito de control
El cálculo de la validación de CPF es bastante sencillo. Funciona a través de pesos asociados con cada número y una división por el número primo 11 al final. Veámoslo por pasos.

Comenzamos usando los primeros 9 dígitos multiplicándolos por la secuencia descendente de 10 a 2 y sumando este resultado.

> 1	4 5	3 8	2 2	0 6
> 
> X	X X	X X	X X	X X
> 
> 10 9 8 7 6 5 4 3 2
> 
> 10 36 40 21 48 10 8 0 12
> 
> 10 + 36 + 40 + 21 + 48 + 10 + 8 + 0 + 12 = 185
> 

Con este resultado en la mano, dividámoslo por **11**, pero lo importante para nosotros no es el resultado, sino el módulo (resto) de la división.

> **185 % 11 = 9**


El resto de la división es **9**. Ahora, para calcular el dígito de control, restemos este resto del número **11**:

**11 - 9 = 2**

Dado que el resultado de la resta fue **2**, el primer dígito de control es igual a 2. Si el resultado de esta división es **10 o mayor**, el penúltimo dígito de control será **0**.

¡Listo! Confirmamos que nuestro **primer dígito de control es válido**.

# Validación del segundo dígito de control
La validación del segundo dígito es similar al primero, pero consideremos el primer dígito de control calculado anteriormente. Por eso la multiplicación se realiza de 11 a 2.

> 1	4	5	3	8	2	2	0	6	2
> 
> X	X	X	X	X	X	X	X	X	X
>
>11	10	9	8	7	6	5	4	3	2
>
>11	40	45	24	56	12	10	0	18	4
>
>11 + 40 + 45 + 24 + 56 + 12 + 10 + 0 + 18 + 4 = 220
>

Nuevamente hagamos la división entre 11 usando el módulo:

**220 % 11 = 0**

Y hagamos la resta:

**11 - 0 = 11**
Dado que el valor es **igual o mayor que 10**, el último dígito es **0**.

Por lo tanto, confirmamos los dos dígitos de control de nuestro CPF 145.382.206-20 y sabemos que este CPF es válido. Otra regla muy importante es que los CPF con números iguales como: **111.111.111-1 **, **222.222.222-22**, entre otros, son **CPF válidos** por el algoritmo pero **no existen en registro oficial **. Por tanto, este tipo de CPF no se puede utilizar.
