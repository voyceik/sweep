function [besthits index] = findinvect2(W, w)
   [besthits , index]=sort(pdist2par(w, W, 'cosine'));
end 
