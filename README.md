# BnyCore
> Um repositório para sites com login público e administrativo escrito em Laravel.

Com esse código simples não é preciso sair do zero para construir seu site com login público e administrativo.

## Instalação

Apenas clone o código e comece a usar

## Tecnologias usadas

Foi usado autenticação [Breeze](https://github.com/laravel/breeze) do Laravel para login público e o [BreezeMulthAuth](https://github.com/painlesscode/breeze-multiauth) para o login administrativo.
Para permissões ACL foi utilizado o [Spatie](https://spatie.be/docs/laravel-permission/v4/introduction).
Para o painel administrativo foi usado [AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE).

## Considerações

Para adicionar novos modelos de login administrativos (mesmo que isso não seja aconselhável) use comandos do Breeze MulthAuth
Use as permissões para restringir o acesso não autorizado e as funções para agrupar essas permissões, atribua as funções aos usuários administrativos e ficará bem organizado.

## Meta

Melhorar o conteúdo e elaborar um instalador no Laravel com composer
