!async function(){try{const t="http://localhost:3000/api/usuarios",e=await fetch(t);!function(t){t.forEach(t=>{const{id:e,nombre:a,apellido:n,email:o,telefono:s,user:d}=t,c=document.createElement("H3");c.classList.add("nombre-usuario"),c.textContent=`${a} ${n}`;const i=document.createElement("P");i.classList.add("email-usuario"),i.textContent=o;const l=document.createElement("P");l.classList.add("user-usuario"),l.textContent=d;const u=document.createElement("P");u.classList.add("telefono-usuario"),u.textContent=s;const r=document.createElement("A");r.classList.add("editar-cliente"),r.setAttribute("href","/editar?id="+e),r.textContent="Editar Usuario";const m=document.createElement("DIV");m.classList.add("divBoton"),m.appendChild(r);const p=document.createElement("DIV");p.classList.add("usuario"),p.dataset.idUsuario=e,p.appendChild(c),p.appendChild(i),p.appendChild(l),p.appendChild(u),p.appendChild(m),document.querySelector("#usuario").appendChild(p)})}(await e.json())}catch(t){console.log(t)}}();