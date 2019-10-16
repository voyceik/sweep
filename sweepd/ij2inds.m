function mret = ij2inds(ijs, tmcol)
% gera indices (varredura) de matriz com tmcol elementos por coluna para cada par i(linha-ijs(:,1)), j(coluna-ijs(:,2)) de
% ijs
mret = (ijs(:,2)-1)*tmcol + (ijs(:,1));
